#!/bin/bash

# Setup script for installer template
# Usage: ./setup.sh owner/repo-name

if [ $# -eq 0 ]; then
    echo "Usage: ./setup.sh owner/repo-name"
    echo "Example: ./setup.sh johndoe/my-installer"
    exit 1
fi

REPO_FULL="$1"
OWNER=$(echo "$REPO_FULL" | cut -d'/' -f1 | tr '[:upper:]' '[:lower:]')
REPO=$(echo "$REPO_FULL" | cut -d'/' -f2 | tr '[:upper:]' '[:lower:]')

# Create PascalCase versions
OWNER_PASCAL=$(echo "$OWNER" | sed 's/./\U&/')
REPO_PASCAL=$(echo "$REPO" | sed -r 's/(^|[-_])([a-z])/\U\2/g' | sed 's/[-_]//g')

echo "Setting up template for: $OWNER/$REPO"
echo "PascalCase: $OWNER_PASCAL/$REPO_PASCAL"

# Replace placeholders
find . -type f \( -name "*.php" -o -name "*.json" -o -name "*.md" \) \
  -not -path "./.git/*" \
  -exec sed -i "s/vendorname\/packagename/$OWNER\/$REPO/g" {} \;

find . -type f \( -name "*.php" -o -name "*.json" -o -name "*.md" \) \
  -not -path "./.git/*" \
  -exec sed -i "s/vendorname\/skeleton/$OWNER\/$REPO/g" {} \;

find . -type f \( -name "*.php" -o -name "*.json" -o -name "*.md" \) \
  -not -path "./.git/*" \
  -exec sed -i "s/vendorname-packagename/$OWNER-$REPO/g" {} \;

find . -type f \( -name "*.php" -o -name "*.json" -o -name "*.md" \) \
  -not -path "./.git/*" \
  -exec sed -i "s/packagename/$REPO/g" {} \;

find . -type f -name "*.php" \
  -not -path "./.git/*" \
  -exec sed -i "s/VendorName\\\\Skeleton/$OWNER_PASCAL\\\\$REPO_PASCAL/g" {} \;

find . -type f -name "*.php" \
  -not -path "./.git/*" \
  -exec sed -i "s/Vendorname\\\\Skeleton/$OWNER_PASCAL\\\\$REPO_PASCAL/g" {} \;

# Replace namespace in composer.json (different escaping for JSON)
sed -i "s/Vendorname\\\\\\\\Skeleton/$OWNER_PASCAL\\\\\\\\$REPO_PASCAL/g" composer.json

find . -type f -name "*.php" \
  -not -path "./.git/*" \
  -exec sed -i "s/class Skeleton/class $REPO_PASCAL/g" {} \;

# Rename files
if [ -f "src/SkeletonServiceProvider.php" ]; then
    mv "src/SkeletonServiceProvider.php" "src/${REPO_PASCAL}ServiceProvider.php"
fi

find src -name "*Skeleton*" -type f | while read file; do
    newfile=$(echo "$file" | sed "s/Skeleton/$REPO_PASCAL/g")
    if [ "$file" != "$newfile" ]; then
        mv "$file" "$newfile"
    fi
done

# Clean up
rm -f setup.sh
rm -f .github/workflows/template-cleanup.yml

echo "Template setup complete!"
echo "Files have been renamed and placeholders replaced."