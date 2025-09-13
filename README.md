# Laravel Installer Package Template

A simple GitHub template for creating Laravel installer packages that publish files to a project.

## Features

- Service provider with Artisan command registration
- File publishing with stubs
- Automatic template setup via GitHub Actions
- PSR-4 compliant structure

## Usage

### Option 1: Use Template Button (Recommended)

1. Click "Use this template" on GitHub
2. Create your new repository
3. The GitHub Action will automatically:
   - Replace `inmanturbo/dashapp` with your `username/repo`
   - Replace `Vendorname\Skeleton` namespace with your PascalCase namespace
   - Rename PHP files for PSR-4 compliance
   - Clean up template files

### Option 2: Manual Clone

1. Clone this repository
2. Run the setup script:
   ```bash
   ./setup.sh your-username/your-package-name
   ```

## What Gets Replaced

- `inmanturbo/dashapp` → your GitHub username/repository
- `inmanturbo-dashapp` → your username-repository (kebab-case)
- `Vendorname\Skeleton` → your PascalCase namespace
- `SkeletonServiceProvider.php` → `YourPackageServiceProvider.php`
- Class names updated to match

## Package Structure

```
your-package/
├── src/
│   └── YourPackageServiceProvider.php
├── stubs/
│   └── (files to publish)
└── composer.json
```

## How It Works

The generated installer package:

1. Registers an Artisan command: `your-username-your-package:install`
2. When run, publishes files from `stubs/` to the Laravel project root
3. Uses `--force` to overwrite existing files

## Customization

After setup, customize:

- Add your files to the `stubs/` directory
- Update the command name and tag in the service provider
- Modify `composer.json` with your package details
- Add any additional logic to the install command

## Example Usage

Once installed in a Laravel project:

```bash
php artisan dashapp:install
```

This will copy all files from your package's `stubs/` directory to the project root.