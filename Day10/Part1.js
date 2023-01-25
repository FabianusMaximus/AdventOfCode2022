function addx(cycle, register, value) {
    let importantValue = 0;
    for (let i = 0; i < 3; i++) {
        cycle.c += 1;
        if (cycle.c === 20 || cycle.c === 60 || cycle.c === 100 || cycle.c === 140 || cycle.c === 180) {
            importantValue = cycle.c * register.r;
        }
        if (i === 2) {
            register.r += value;
        }
    }
    return importantValue;
}

const fs = require('fs');
try {
    let input = fs.readFileSync('./input.txt', 'utf8');
    let cycle = {c: 0};
    let register = {r: 0};
    input = input.replaceAll("\r", "");
    let line = input.split("\n");
    let signalStrengths = [];
    let erg = 0;
    for (const operation of line) {
        let split = operation.split(" ");
        if (split[0] === "addx") {
            let iValue = addx(cycle, register, parseInt(split[1]));
            if (iValue !== 0) {
                signalStrengths.push(iValue);
            }
        } else {
            cycles += 1;
        }
    }
    for (const strength of signalStrengths) {
        erg += strength;
    }
    console.log("Ergebnis: ", erg);

} catch (err) {
    console.error(err);
}