# Update JavaScript inline event handlers to use CSS variables
# This script targets onmouseover and onmouseout attributes

Write-Host "Updating JavaScript event handlers with CSS variables..." -ForegroundColor Green

# Get all blade files
$bladeFiles = Get-ChildItem -Path "resources/views" -Filter "*.blade.php" -Recurse

foreach ($file in $bladeFiles) {
    Write-Host "Processing: $($file.FullName)" -ForegroundColor Cyan
    
    # Read file content
    $content = Get-Content -Path $file.FullName -Raw
    
    # Track if changes were made
    $originalContent = $content
    
    # Replace hex colors in JavaScript event handlers
    # #E8B923 -> var(--accent-gold)
    $content = $content -replace "backgroundColor='#E8B923'", "backgroundColor='var(--accent-gold)'"
    $content = $content -replace 'backgroundColor="#E8B923"', 'backgroundColor="var(--accent-gold)"'
    $content = $content -replace "borderColor='#E8B923'", "borderColor='var(--accent-gold)'"
    $content = $content -replace 'borderColor="#E8B923"', 'borderColor="var(--accent-gold)"'
    
    # #6FCF97 -> var(--primary-green)
    $content = $content -replace "backgroundColor='#6FCF97'", "backgroundColor='var(--primary-green)'"
    $content = $content -replace 'backgroundColor="#6FCF97"', 'backgroundColor="var(--primary-green)"'
    $content = $content -replace "borderColor='#6FCF97'", "borderColor='var(--primary-green)'"
    $content = $content -replace 'borderColor="#6FCF97"', 'borderColor="var(--primary-green)"'
    
    # #228B22 -> var(--primary-green)
    $content = $content -replace "backgroundColor='#228B22'", "backgroundColor='var(--primary-green)'"
    $content = $content -replace 'backgroundColor="#228B22"', 'backgroundColor="var(--primary-green)"'
    
    # #333333 or #333 -> var(--neutral-gray)
    $content = $content -replace "color='#333333'", "color='var(--neutral-gray)'"
    $content = $content -replace 'color="#333333"', 'color="var(--neutral-gray)"'
    $content = $content -replace "color='#333'", "color='var(--neutral-gray)'"
    $content = $content -replace 'color="#333"', 'color="var(--neutral-gray)"'
    
    # Only write if changes were made
    if ($content -ne $originalContent) {
        Set-Content -Path $file.FullName -Value $content -NoNewline
        Write-Host "  Updated JavaScript colors in $($file.Name)" -ForegroundColor Green
    } else {
        Write-Host "  No JavaScript color updates needed in $($file.Name)" -ForegroundColor Gray
    }
}

Write-Host ""
Write-Host "JavaScript color updates complete!" -ForegroundColor Green
