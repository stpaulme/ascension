# Ascension

The theme for the five Ascension sites: Ascension Catholic Academy, Ascension Catholic School, Church of the Ascension, St. John Paul II and St. Peter Claver.

## Installation

1. Clone this repo to `<your-project>/wp-content/themes`.
2. Navigate to the theme folder and run the following commands:
```
npm install
gulp build
```
3. Open the WordPress dashboard and activate the theme.

### Dependencies

- [WordPress](https://wordpress.org/)
- [Node](https://nodejs.org/en/)
- [Advanced Custom Fields Pro](https://advancedcustomfields.com/)
- [Timber](https://www.upstatement.com/timber/)

---

## Usage

After activating the theme in your local environment, navigate to `<your-project>/wp-content/themes/<theme-folder>` and run `gulp`. The files in `./src/js` and `./src/scss` will now be watched for changes and compiled.

### Custom Fields

The theme uses [Advanced Custom Fields](https://advancedcustomfields.com/) for all custom fields.

In your local environment, use the ACF UI to modify custom fields. They will be automatically saved as `.json` files in the `./acf-json` folder, which allows them to be version controlled and synced to the server.

**Important: Do not use the ACF UI on the staging or the production server.** Otherwise, the `./acf-json` folder will get out of sync.

### Templates

The theme uses [Timber](https://www.upstatement.com/timber/) to separate logic (PHP files) from presentation (Twig files). The top-level PHP files in the theme folder are your typical WordPress theme files. They contain logic that supplies the Twig files in the `./templates` folder with data. All HTML is done in Twig.

---

## Deployment

GitHub Actions provides push-to-deploy functionality. If you merge a pull request into `master`, the theme will be compiled and synced with the production server for all five sites.

Update server details in the `./.github` directory.

Update the `DEPLOY_KEY` on GitHub under Settings &#8594; Secrets.

### Cache busting

The theme's stylesheet is versioned using the file's last modified time. This number is added to the URL as a query string to bust caches.