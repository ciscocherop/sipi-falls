#!/bin/bash
# Typography and Color Update Script for Sipi Falls Blade Files
# This script updates all blade files to use the new CSS variable system

echo "Starting typography and color updates..."

# Find all blade files
find resources/views -name "*.blade.php" -type f | while read -r file; do
    echo "Processing: $file"
    
    # Create backup
    cp "$file" "$file.backup"
    
    # ============ TYPOGRAPHY UPDATES ============
    
    # Replace 'Montserrat' with var(--font-body) for general use
    sed -i "s/font-family: 'Montserrat', sans-serif/font-family: var(--font-body)/g" "$file"
    
    # ============ COLOR UPDATES ============
    
    # Replace color values with CSS variables
    sed -i 's/color:\s*#228B22/color: var(--primary-green)/g' "$file"
    sed -i 's/color: #228B22/color: var(--primary-green)/g' "$file"
    sed -i 's/color:#228B22/color: var(--primary-green)/g' "$file"
    
    sed -i 's/color:\s*#E8B923/color: var(--accent-gold)/g' "$file"
    sed -i 's/color: #E8B923/color: var(--accent-gold)/g' "$file"
    sed -i 's/color:#E8B923/color: var(--accent-gold)/g' "$file"
    
    sed -i 's/color:\s*#333333/color: var(--neutral-gray)/g' "$file"
    sed -i 's/color: #333333/color: var(--neutral-gray)/g' "$file"
    sed -i 's/color:#333333/color: var(--neutral-gray)/g' "$file"
    sed -i 's/color: #333/color: var(--neutral-gray)/g' "$file"
    sed -i 's/color:#333/color: var(--neutral-gray)/g' "$file"
    
    # Replace background-color values
    sed -i 's/background-color:\s*#228B22/background-color: var(--primary-green)/g' "$file"
    sed -i 's/background-color: #228B22/background-color: var(--primary-green)/g' "$file"
    sed -i 's/background-color:#228B22/background-color: var(--primary-green)/g' "$file"
    sed -i 's/background:\s*#228B22/background: var(--primary-green)/g' "$file"
    sed -i 's/background: #228B22/background: var(--primary-green)/g' "$file"
    sed -i 's/background:#228B22/background: var(--primary-green)/g' "$file"
    
    sed -i 's/background-color:\s*#E8B923/background-color: var(--accent-gold)/g' "$file"
    sed -i 's/background-color: #E8B923/background-color: var(--accent-gold)/g' "$file"
    sed -i 's/background-color:#E8B923/background-color: var(--accent-gold)/g' "$file"
    sed -i 's/background:\s*#E8B923/background: var(--accent-gold)/g' "$file"
    sed -i 's/background: #E8B923/background: var(--accent-gold)/g' "$file"
    sed -i 's/background:#E8B923/background: var(--accent-gold)/g' "$file"
    
    # Replace border-color values
    sed -i 's/border-color:\s*#6FCF97/border-color: var(--primary-green)/g' "$file"
    sed -i 's/border-color: #6FCF97/border-color: var(--primary-green)/g' "$file"
    sed -i 's/border-color:#6FCF97/border-color: var(--primary-green)/g' "$file"
    sed -i 's/border: 2px solid #6FCF97/border: 2px solid var(--primary-green)/g' "$file"
    sed -i 's/border: 3px solid #6FCF97/border: 3px solid var(--primary-green)/g' "$file"
    sed -i 's/border: 4px solid #6FCF97/border: 4px solid var(--primary-green)/g' "$file"
    
    # Replace any remaining #6FCF97 references
    sed -i 's/#6FCF97/var(--primary-green)/g' "$file"
    
    # Replace #FF6F61 with var(--accent-gold)
    sed -i 's/#FF6F61/var(--accent-gold)/g' "$file"
    
done

echo ""
echo "✓ Typography and color updates complete!"
echo ""
echo "Summary of changes:"
echo "  - Updated font-family: 'Montserrat' to var(--font-body)"
echo "  - Replaced #228B22 with var(--primary-green)"
echo "  - Replaced #E8B923 with var(--accent-gold)"
echo "  - Replaced #333333 with var(--neutral-gray)"
echo "  - Replaced #6FCF97 with var(--primary-green)"
echo "  - Replaced #FF6F61 with var(--accent-gold)"
echo ""
echo "Backup files created with .backup extension"
echo "To remove backups after verification: find resources/views -name '*.backup' -type f -delete"
