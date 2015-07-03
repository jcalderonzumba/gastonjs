# Welcome to GastonJS documentation
Creating web pages and ensuring that they behave as you want them to behave is something that a lot of projects try to solve, so let me explain you what this project is about:

* GastonJS allows you to use all the power [PhantomJS](http://phantomjs.org/) provides by implementing a simple command based HTTP API.
* GastonJS API allows you to implement a browser client on any programming language that can make HTTP requests.
* GastonJS gives you all the control, you are the one that will tell the browser what to do, similar to Selenium based tests.

## Installation

GastonJS comes with a PHP built in client that allows you to control the browser and interact with it.

The objective of this document is not to teach you how to install [PhantomJS](http://phantomjs.org/) so please make sure you have a working installation of [PhantomJS](http://phantomjs.org/) before using GastonJS.

The recommended way to install GastonJS and the PHP built in client is through [Composer](https://getcomposer.org/):

```bash
composer require jcalderonzumba/gastonjs
```

Everything will be installed inside `vendor` folder, as with any composer package you can start using it by including the autoloading script in your PHP project.

## Learn to control the Browser
* [GastonJS API](api/index.md)
* [PHP GastonJS Client](clients/php/index.md)

## Special thanks
None of this work would have been possible without the awesome work done by the [Poltergeist team](https://github.com/teampoltergeist/poltergeist).

We fork their code and took it to another level, but the roots are still there and we want to acknowledge that.
