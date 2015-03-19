Gulp
==

For this project we'll use Gulp to build the `assets` (CSS, JS and Images) folder. Changes to this files are made in the `src` folder. Gulp will compile everything to the `dist` folder. NEVER change files that are in the `dist` folder.

To keep the repo clean we chose to ignore the node_modules folder, so you'll first need to install Gulp and the plugins.

##Installing gulp##

Before we delve into configuring tasks, we need to install gulp:

    npm install gulp -g

This installs gulp globally, giving access to gulp’s CLI. Standing in the root of the project you can do the following to install Gulp (& plugins) in the project:

    npm install

I (Tim) had some strange warnings/errors, but this was fixed by running the above command with `sudo`.

Want to install/update a plugin:

    npm install require-dir --save-dev

##Compiling with Gulp##

If you changed something in the assets `src` folder you'll need to compile the edited files. This can be done by running the following:

    gulp

However, this will run the compile script once; if you are planning to compile more than once use the following:

    gulp watch

By watching Gulp will look for changes in the `src` folder and compile that specific file.