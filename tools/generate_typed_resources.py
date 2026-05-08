#!/usr/bin/env python3
"""
Regenerate typed Wix domain resource operation methods from wix-rest-docs.

Usage:
  python3 tools/generate_typed_resources.py --docs-root /tmp/wix-rest-docs
"""

from __future__ import annotations

import argparse
import json
import re
from collections import defaultdict
from pathlib import Path


RESOURCE_CLASS_RE = re.compile(r"class\s+(\w+)\s+extends\s+Domain")
RESOURCE_SEGMENT_RE = re.compile(r"protected string \$segment = '([^']+)'")
PUBLIC_FUNCTION_RE = re.compile(r"public function ")
WIX_URL_RE = re.compile(r"https?://www\.wixapis\.com/([^/]+)/(.+)$")
RESERVED_METHOD_NAMES = {"request", "get", "post", "put", "patch", "delete"}


def to_method_name(name: str) -> str:
    raw = re.sub(r"[^A-Za-z0-9]", "", name)
    if raw:
        return raw[0].lower() + raw[1:]

    parts = [p for p in re.split(r"[^A-Za-z0-9]+", name) if p]
    if not parts:
        return "operation"

    return parts[0].lower() + "".join(p[:1].upper() + p[1:] for p in parts[1:])


def build_resource_content(class_name: str, segment: str, methods: list[tuple[str, str, str]]) -> str:
    lines: list[str] = [
        "<?php",
        "",
        "namespace Chkltlabs\\WixClient\\Resources;",
        "",
        "use UnexpectedValueException;",
        "",
        f"class {class_name} extends Domain",
        "{",
        f"    protected string $segment = '{segment}';",
        "",
        "    private function executeOperation(string $httpMethod, string $path, array $pathParams = [], array $params = []): object",
        "    {",
        "        if (preg_match_all('/\\{([^}]+)\\}/', $path, $matches) > 0 && !empty($matches[1])) {",
        "            foreach ($matches[1] as $placeholder) {",
        "                $pathParamKey = explode('=', $placeholder)[0];",
        "                if (!array_key_exists($pathParamKey, $pathParams)) {",
        "                    throw new UnexpectedValueException('Missing required path param: ' . $pathParamKey);",
        "                }",
        "                $path = str_replace('{' . $placeholder . '}', rawurlencode((string) $pathParams[$pathParamKey]), $path);",
        "            }",
        "        }",
        "",
        "        return $this->request($httpMethod, $path, $params);",
        "    }",
        "",
    ]

    for method_name, http_method, path in methods:
        lines.extend(
            [
                f"    public function {method_name}(array $pathParams = [], array $params = []): object",
                "    {",
                f"        return $this->executeOperation('{http_method}', '{path}', $pathParams, $params);",
                "    }",
                "",
            ]
        )

    lines.append("}")
    return "\n".join(lines)


def main() -> None:
    parser = argparse.ArgumentParser()
    parser.add_argument(
        "--docs-root",
        default="/tmp/wix-rest-docs",
        help="Path to local clone of wix-incubator/wix-rest-docs",
    )
    parser.add_argument(
        "--resources-dir",
        default="src/Resources",
        help="Path to generated typed resource classes",
    )
    args = parser.parse_args()

    docs_root = Path(args.docs_root)
    resources_dir = Path(args.resources_dir)

    class_segments: dict[str, str] = {}
    for file in sorted(resources_dir.glob("*.php")):
        if file.name == "Domain.php":
            continue
        text = file.read_text()
        class_match = RESOURCE_CLASS_RE.search(text)
        segment_match = RESOURCE_SEGMENT_RE.search(text)
        if class_match and segment_match:
            class_segments[class_match.group(1)] = segment_match.group(1)

    ops_by_segment: dict[str, list[tuple[str, str, str]]] = defaultdict(list)
    for service_file in sorted((docs_root / "all" / "all-apis").glob("*.service.json")):
        data = json.loads(service_file.read_text())
        for operation in data.get("operations", []):
            docs = operation.get("docs") or {}
            url = (docs.get("url") or "").strip()
            request_method = (docs.get("request") or "GET").lower()

            match = WIX_URL_RE.match(url)
            if not match:
                continue

            segment, path = match.group(1), match.group(2)
            op_name = operation.get("methodName") or operation.get("name") or "operation"
            ops_by_segment[segment].append((op_name, request_method, path))

    for class_name, segment in sorted(class_segments.items()):
        segment_ops = ops_by_segment.get(segment, [])
        if not segment_ops:
            continue

        unique_ops: list[tuple[str, str, str]] = []
        seen_route_keys: set[tuple[str, str]] = set()
        for op_name, request_method, path in segment_ops:
            route_key = (request_method, path)
            if route_key in seen_route_keys:
                continue
            seen_route_keys.add(route_key)
            unique_ops.append((op_name, request_method, path))

        used_names: set[str] = set()
        rendered_methods: list[tuple[str, str, str]] = []
        for op_name, request_method, path in unique_ops:
            base_name = to_method_name(op_name)
            if base_name.lower() in RESERVED_METHOD_NAMES:
                base_name = f"{base_name}Operation"
            candidate = base_name
            suffix_idx = 2

            while candidate.lower() in used_names:
                suffix = re.sub(r"[^A-Za-z0-9]+", " ", path).title().replace(" ", "")
                if suffix_idx == 2:
                    candidate = f"{base_name}{suffix}"
                else:
                    candidate = f"{base_name}{suffix}{suffix_idx}"
                suffix_idx += 1

            used_names.add(candidate.lower())
            rendered_methods.append((candidate, request_method, path))

        target = resources_dir / f"{class_name}.php"
        target.write_text(build_resource_content(class_name, segment, rendered_methods))

    total_classes = len(class_segments)
    print(f"Generated typed operations for {total_classes} domain resources.")


if __name__ == "__main__":
    main()
