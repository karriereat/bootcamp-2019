# npm

## What is npm?
<https://docs.npmjs.com/about-npm/>

## How do I install npm?
<https://www.npmjs.com/get-npm>

## Where do I find packages?
<https://www.npmjs.com/>

## How do I install packages?

```
mkdir project
cd project
npm init
npm install is-even
```

## How do I use packages? (How do I write a Node.js script?)

```
// index.js
const isEven = require('is-even');

console.log(isEven(1));
console.log(isEven(2));
console.log(isEven(3));
```

```
node index.js
# false
# true
# false
```

## Can I write my own modules/packages?

Example in `/modules-require`

## How do I use modules in a browser?

<https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Modules>

Example in `/modules-import`

## How do I use npm packages in a browser?

Module Bundlers
* <http://browserify.org/>
* <https://webpack.js.org/>
* <https://rollupjs.org/guide/en/>
