# Buster WP

A WordPress client for [Buster](https://github.com/MelonSmasher/Buster)

Buster WP sends purge requests to your [Buster server](https://github.com/MelonSmasher/Buster) when pages in WordPress are updated.

This helps strikes a balance between performance and updated content delivery.

## Installation:

Check the releases page for the latest version tag.

```bash
cd wp-content/plugins;
git clone https://github.com/MelonSmasher/Buster-WP.git buster-wp;
cd buster-wp;
git checkout v1.0.0;
php bones update; 
```

After installing the plugin activate it, in the wp-admin plugins page.

## Configuration

Open the Buster WP admin page from the left bar. Then update your settings with your Buster settings.


## Related Projects

Some cool projects that this software relies on.

* [wpbones/WPBones](https://github.com/wpbones/WPBones)
* [guzzle/guzzle](https://github.com/guzzle/guzzle)
* [nesbot/carbon](https://github.com/nesbot/carbon)
* [wanfeiyy/dd](https://github.com/wanfeiyy/dd)
* [MelonSmasher/Buster-Client](https://github.com/MelonSmasher/Buster-Client)
* [MelonSmasher/Buster](https://github.com/MelonSmasher/Buster)
