# Vendored Jane runtime classes

The classes in this directory are vendored copies of the three classes the
generated API clients (`Api/*`) actually use from the Jane runtime packages:

| Class | Origin package | Version |
|---|---|---|
| `Jane\Component\JsonSchemaRuntime\Reference` | jane-php/json-schema-runtime | v7.5.5 |
| `Jane\Component\OpenApiRuntime\Client\AuthenticationPlugin` | jane-php/open-api-runtime | v7.5.5 |
| `Jane\Component\OpenApiRuntime\Client\Plugin\AuthenticationRegistry` | jane-php/open-api-runtime | v7.5.5 |

Both packages are MIT licensed (see `LICENSE` in this directory).

## Why

`jane-php/json-schema-runtime` (every 7.x release) requires `symfony/yaml >= 4.4.9`,
but O3-Shop wedges `symfony/yaml` at 3.4.x (`o3-shop/shop-ce` allows `~3.4 || ~4.0`
while `o3-shop/testing-library` allows `~3.0 || ^5.4` — the intersection is 3.x).
That makes the jane runtime packages uninstallable alongside O3-Shop.

Vendoring these three classes removes the `jane-php/*` composer requirements
entirely; the remaining dependencies (`league/uri`, `php-jsonpointer`,
`php-http/*`, `symfony/options-resolver`) are conflict-free with O3-Shop, and
`Reference`'s `Yaml::parse()` fallback is API-compatible with symfony/yaml 3.4+.

The namespaces are kept as-is so the generated code in `Api/` does not need any
changes and can be regenerated with `jane-php/open-api-3` (see `require-dev`)
without touching this directory.
