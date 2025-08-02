doc:
	@vendor/bin/sail artisan ide-helper:generate --ansi
	@vendor/bin/sail artisan ide-helper:meta --ansi
	@vendor/bin/sail artisan ide-helper:models --write --ansi
