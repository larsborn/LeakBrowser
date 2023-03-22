.PHONY: php-cs-fix
php-cs-fix:
	PHP_CS_FIXER_FUTURE_MODE=1 vendor/bin/php-cs-fixer fix --allow-risky=yes
