const readline = require('readline');

const rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout
});

function readNumber(callback) {
    rl.question('Can you give me a number? ', (answer) => {
        callback(answer);
        rl.close();
    });
}

module.exports = readNumber;
