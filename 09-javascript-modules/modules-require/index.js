const isEven = require('is-even');
const readNumber = require('./modules/read-number');

function callback(number) {
    try {
        console.log(`${number} is ${isEven(number) ? 'even' : 'odd'}.`);
    } catch (e) {
        console.error(`${number} is not a number.`);
    }
}

readNumber(callback);
