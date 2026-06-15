@echo off
set PHP84=%LOCALAPPDATA%\Microsoft\WinGet\Packages\PHP.PHP.8.4_Microsoft.Winget.Source_8wekyb3d8bbwe\php.exe
if not exist "%PHP84%" (
  echo PHP 8.4 no encontrado. Instala con: winget install PHP.PHP.8.4
  pause
  exit /b 1
)
cd /d "%~dp0"
echo Servidor: http://127.0.0.1:8000
"%PHP84%" artisan serve --host=127.0.0.1 --port=8000
