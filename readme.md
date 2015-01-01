## Sphinxy: Round 2

An evolution of [this](https://github.com/stefobark/config) other configurator I started building before learning about Laravel. Now, I'm taking another shot at it. Keeping all configuration settings in a database. Reorganizing stuff. Learning more. 

###To get started###

Put this onto your own machine. Should help to keep track of your configuration files (and should help you understand Sphinx configuration basics as you build). Create, update, delete configuration files!

1. Clone this into some directory:
 * ```git clone https://github.com/stefobark/config.git```
2. Do you have composer installed? If not, then [install it](https://getcomposer.org/doc/00-intro.md).
3. Then, from the directory:
 * ```composer install```
4. Do you have MySQL running? If not, get it going.
 * create a database called ```forge```
5. Then:
 * ```php artistan migrate```
6. And.. start doing stuff. Submit pull requests. Help me out. Give me suggestions. I'm learning as I go.

Tweet at me: @steven_barker. Or, email me at steven.j.barker.jr@gmail.com

###More things to do###

1. Add ```indexer``` config block.
 * My last try didn't include any indexer settings, I just let Sphinx go with the defaults.
2. Validation!
 * Right now, I'm just checking if variables exist (in the view) and if they don't, I'm saying: **XXX MUST EXIST**
3. Much more. Things I'm not even aware of yet.

If you're interested, I'm keeping all my thoughts on this publicly editable [google doc](https://docs.google.com/document/d/1UlJA5j47cxIzopHNBfb7GVt4AgAXqqU71IU5Kji6VyY/edit) 
