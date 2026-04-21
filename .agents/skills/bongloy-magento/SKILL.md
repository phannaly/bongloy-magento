```markdown
# bongloy-magento Development Patterns

> Auto-generated skill from repository analysis

## Overview

This skill provides a comprehensive guide to contributing to the `bongloy-magento` repository, which extends Magento with support for various payment methods. The codebase is primarily JavaScript (with significant PHP components), and follows clear conventions for file structure, coding style, and workflows. This document outlines the key coding conventions, common development workflows, and testing patterns to help you contribute efficiently and consistently.

## Coding Conventions

### File Naming

- **JavaScript files:** Use PascalCase (e.g., `PaymentMethodRenderer.js`)
- **PHP files:** Use PascalCase (e.g., `OmiseHelper.php`)
- **Test files:** Use `*.test.ts` for JavaScript/TypeScript tests

### Import Style

- Use **relative imports** for JavaScript modules.
  ```js
  import PaymentHelper from '../helper/PaymentHelper';
  ```

### Export Style

- Use **named exports** for JavaScript modules.
  ```js
  export function renderPaymentMethod() { ... }
  ```

### Commit Messages

- Freeform style, often referencing the purpose (e.g., bug fix, feature addition)
- Average commit message length: ~57 characters

## Workflows

### Add New Payment Method

**Trigger:** When introducing a new payment method to the Magento extension  
**Command:** `/add-payment-method`

1. **Create or update config file:**  
   `Model/Config/PaymentMethodName.php`
2. **Register the method:**  
   Update `etc/adminhtml/system.xml`, `etc/config.xml`, and `etc/di.xml`
3. **Add/update frontend JS renderer:**  
   `view/frontend/web/js/view/payment/method-renderer/omise-offsite-<payment>-method.js`
4. **Add/update frontend HTML template:**  
   `view/frontend/web/template/payment/offsite-<payment>-form.html`
5. **Implement method logic:**  
   Update `Helper/OmiseHelper.php` and/or `Gateway/Request/APMBuilder.php`
6. **Add logo/image if needed:**  
   Update `view/frontend/web/css/styles.css` and add image to `view/frontend/web/images/`
7. **Update checkout layout:**  
   Edit `view/frontend/layout/checkout_index_index.xml` to include the renderer
8. **Dynamic capabilities (if needed):**  
   Update `Model/Capabilities.php` and/or `Model/Ui/CapabilitiesConfigProvider.php`

**Example:**  
To add GrabPay, create `Model/Config/GrabPay.php`, update the relevant XML files, add a renderer JS file and template, and include the GrabPay logo.

---

### Release Version

**Trigger:** When publishing a new version/release of the plugin  
**Command:** `/release`

1. Update the version in `composer.json`
2. Update the version in `etc/module.xml`
3. Update `CHANGELOG.md` with release notes

---

### Add or Update GitHub Actions Workflow

**Trigger:** When adding or changing CI/CD automation  
**Command:** `/add-ci-workflow`

1. Add or update `.github/workflows/*.yml` files
2. Add or update supporting scripts in `.github/workflows/` if needed
3. Update `.gitignore` if necessary
4. Update `composer.json` or other config files if required

---

### Add or Update Unit Tests

**Trigger:** When improving or adding test coverage  
**Command:** `/add-unit-test`

1. Create or update `Test/Unit/*Test.php` files
2. Update `phpunit.xml` if necessary
3. Update or add related source files (e.g., `Helper/OmiseHelper.php`)

---

### Fix Bug or Apply Coding Standard

**Trigger:** When fixing a bug or making the codebase comply with coding standards  
**Command:** `/fix-bug`

1. Edit one or more PHP/JS files to fix the bug or apply code style
2. Commit with a message referencing the coding standard or bug fix
3. Update related files for consistency if needed

---

## Testing Patterns

- **Test files:** Use the pattern `*.test.ts` for JavaScript/TypeScript tests
- **PHP unit tests:** Located in `Test/Unit/*.php`
- **Test framework:** Not explicitly detected; likely uses PHPUnit for PHP
- **Configuration:** Update `phpunit.xml` as needed

**Example:**  
```typescript
// PaymentHelper.test.ts
import { renderPaymentMethod } from '../helper/PaymentHelper';

test('renders payment method correctly', () => {
  // ...test implementation...
});
```

## Commands

| Command              | Purpose                                                |
|----------------------|--------------------------------------------------------|
| /add-payment-method  | Add support for a new payment method                   |
| /release             | Prepare and release a new version                      |
| /add-ci-workflow     | Add or update a GitHub Actions workflow                |
| /add-unit-test       | Add or update unit tests                               |
| /fix-bug             | Fix a bug or apply coding standards                    |
```