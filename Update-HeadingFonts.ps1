# Update h1, h2, h3 elements to use var(--font-display) instead of var(--font-body)
# This script specifically targets heading elements

Write-Host "Updating h1, h2, h3 elements to use display font..." -ForegroundColor Green

# Get all blade files
$bladeFiles = Get-ChildItem -Path "resources/views" -Filter "*.blade.php" -Recurse

foreach ($file in $bladeFiles) {
    Write-Host "Processing: $($file.FullName)" -ForegroundColor Cyan
    
    # Read file content
    $content = Get-Content -Path $file.FullName -Raw
    
    # Track if changes were made
    $originalContent = $content
    
    # Simple string replacements for h1, h2, h3 with font-family: var(--font-body)
    # We'll use a multi-step approach to handle different spacing patterns
    
    # h1 replacements
    $content = $content -replace '<h1([^>]*)font-family: var\(--font-body\)', '<h1$1font-family: var(--font-display)'
    $content = $content -replace '<h1([^>]*)font-family:var\(--font-body\)', '<h1$1font-family:var(--font-display)'
    
    # h2 replacements
    $content = $content -replace '<h2([^>]*)font-family: var\(--font-body\)', '<h2$1font-family: var(--font-display)'
    $content = $content -replace '<h2([^>]*)font-family:var\(--font-body\)', '<h2$1font-family:var(--font-display)'
    
    # h3 replacements
    $content = $content -replace '<h3([^>]*)font-family: var\(--font-body\)', '<h3$1font-family: var(--font-display)'
    $content = $content -replace '<h3([^>]*)font-family:var\(--font-body\)', '<h3$1font-family:var(--font-display)'
    
    # Only write if changes were made
    if ($content -ne $originalContent) {
        Set-Content -Path $file.FullName -Value $content -NoNewline
        Write-Host "  Updated headings in $($file.Name)" -ForegroundColor Green
    } else {
        Write-Host "  No heading updates needed in $($file.Name)" -ForegroundColor Gray
    }
}

Write-Host ""
Write-Host "Heading font updates complete!" -ForegroundColor Green
Write-Host "All h1, h2, h3 elements now use var(--font-display)" -ForegroundColor Yellow
