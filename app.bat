@echo off
REM Start Laragon with all services
start "" "C:\laragon\laragon.exe" start

REM Wait for Laragon to start completely (adjust if needed)
timeout /t 5 /nobreak

REM Open the summary.test website in the default browser
start "" "http://summary.test"

exit
