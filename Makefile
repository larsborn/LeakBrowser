.PHONY: php-cs-fix
php-cs-fix:
	PHP_CS_FIXER_FUTURE_MODE=1 vendor/bin/php-cs-fixer fix --allow-risky=yes

.PHONY: psalm
psalm:
	vendor/bin/psalm --no-cache --show-info=true

.PHONY: psalm-update-baseline
psalm-update-baseline:
	vendor/bin/psalm --no-cache --set-baseline=psalm-baseline.xml

.PHONY: dev
dev: psalm php-cs-fix
