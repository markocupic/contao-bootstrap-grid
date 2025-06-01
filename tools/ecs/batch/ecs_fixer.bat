:: Run easy-coding-standard (ecs) via this batch file inside your IDE e.g. PhpStorm (Windows only)
:: Install inside PhpStorm the  "Batch Script Support" plugin
cd..
cd..
cd..
cd..
cd..
cd..
php vendor\bin\ecs check vendor/markocupic/contao-bootstrap-grid/src --fix --config vendor/markocupic/contao-bootstrap-grid/tools/ecs/config.php
php vendor\bin\ecs check vendor/markocupic/contao-bootstrap-grid/contao --fix --config vendor/markocupic/contao-bootstrap-grid/tools/ecs/config.php
php vendor\bin\ecs check vendor/markocupic/contao-bootstrap-grid/config --fix --config vendor/markocupic/contao-bootstrap-grid/tools/ecs/config.php
php vendor\bin\ecs check vendor/markocupic/contao-bootstrap-grid/templates --fix --config vendor/markocupic/contao-bootstrap-grid/tools/ecs/config.php
php vendor\bin\ecs check vendor/markocupic/contao-bootstrap-grid/tests --fix --config vendor/markocupic/contao-bootstrap-grid/tools/ecs/config.php
