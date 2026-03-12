# Typography and Color Update Script for Sipi Falls Blade Files
# This script updates all blade files to use the new CSS variable system

Write-Host "Starting typography and color updates..." -ForegroundColor Green

# Get all blade files
$bladeFiles = Get-ChildItem -Path "resources/views" -Filter "*.blade.php" -Recurse

foreach ($file in $bladeFiles) {
    Write-Host "Processing: $($file.FullName)" -ForegroundColor Cyan
    
    # Read file content
    $content = Get-Content -Path $file.FullName -Raw
    
    # Create backup
    Copy-Item -Path $file.FullName -Destination "$($file.FullName).backup" -Force
    
    # ============ TYPOGRAPHY UPDATES ============
    
    # Replace 'Montserrat' with var(--font-body) for general use
    $content = $content -replace "font-family: 'Montserrat', sans-serif", "font-family: var(--font-body)"
    
    # ============ COLOR UPDATES ============
    
    # Replace color values with CSS variables
    $content = $content -replace "color:\s*#228B22", "color: var(--primary-green)"
    $content = $content -replace "color:\s*#E8B923", "color: var(--accent-gold)"
    $content = $content -replace "color:\s*#333333", "color: var(--neutral-gray)"
    $content = $content -replace "color:\s*#333(?![0-9a-fA-F])", "color: var(--neutral-gray)"
    
    # Replace background-color values
    $content = $content -replace "background-color:\s*#228B22", "background-color: var(--primary-green)"
    $content = $content -replace "background:\s*#228B22", "background: var(--primary-green)"
    $content = $content -replace "background-color:\s*#E8B923", "background-color: var(--accent-gold)"
    $content = $content -replace "background:\s*#E8B923", "background: var(--accent-gold)"
    
    # Replace border-color values
    $content = $content -replace "border-color:\s*#6FCF97", "border-color: var(--primary-green)"
    
    # Replace any remaining #6FCF97 references
    $content = $content -replace "#6FCF97", "var(--primary-green)"
    
    # Replace #FF6F61 with var(--accent-gold)
    $content = $content -replace "#FF6F61", "var(--accent-gold)"
    
    # Clean up double semicolons
    $content = $content -replace ";;", ";"
    
    # Write updated content back to file
    Set-Content -Path $file.FullName -Value $content -NoNewline
}

Write-Host ""
Write-Host "✓ Typography and color updates complete!" -ForegroundColor Green
Write-Host ""
Write-Host "Summary of changes:" -ForegroundColor Yellow
Write-Host "  - Updated font-family: 'Montserrat' to var(`--font-body)"
Write-Host "  - Replaced #228B22 with var(`--primary-green)"
Write-Host "  - Replaced #E8B923 with var(`--accent-gold)"
Write-Host "  - Replaced #333333 with var(`--neutral-gray)"
Write-Host "  - Replaced #6FCF97 with var(`--primary-green)"
Write-Host "  - Replaced #FF6F61 with var(`--accent-gold)"
Write-Host ""
Write-Host "Backup files created with .backup extension" -ForegroundColor Cyan
Write-Host "To remove backups after verification: Get-ChildItem -Path 'resources/views' -Filter '*.backup' -Recurse | Remove-Item" -ForegroundColor Gray
