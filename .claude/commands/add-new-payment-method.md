---
name: add-new-payment-method
description: Workflow command scaffold for add-new-payment-method in bongloy-magento.
allowed_tools: ["Bash", "Read", "Write", "Grep", "Glob"]
---

# /add-new-payment-method

Use this workflow when working on **add-new-payment-method** in `bongloy-magento`.

## Goal

Adds support for a new payment method (e.g., GrabPay, Google Pay, OCBC Pao, RMS Wallet, etc.) to the Magento extension.

## Common Files

- `Model/Config/*.php`
- `etc/adminhtml/system.xml`
- `etc/config.xml`
- `etc/di.xml`
- `view/frontend/web/js/view/payment/method-renderer/omise-offsite-*-method.js`
- `view/frontend/web/template/payment/offsite-*-form.html`

## Suggested Sequence

1. Understand the current state and failure mode before editing.
2. Make the smallest coherent change that satisfies the workflow goal.
3. Run the most relevant verification for touched files.
4. Summarize what changed and what still needs review.

## Typical Commit Signals

- Create or update a Model/Config/PaymentMethodName.php config file.
- Update etc/adminhtml/system.xml, etc/config.xml, and etc/di.xml to register the method.
- Add or update frontend JS renderer: view/frontend/web/js/view/payment/method-renderer/omise-offsite-<payment>-method.js.
- Add or update frontend HTML template: view/frontend/web/template/payment/offsite-<payment>-form.html.
- Update Helper/OmiseHelper.php and/or Gateway/Request/APMBuilder.php for method logic.

## Notes

- Treat this as a scaffold, not a hard-coded script.
- Update the command if the workflow evolves materially.