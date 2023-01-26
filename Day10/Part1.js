function incrementCycle(cycle) {
    cycle.c += 1;
}

function checkCycle(number) {
    return number === 20 || number === 60 || number === 100 || number === 140 || number === 180 || number === 220;
}

function calculateSignalStrength(cycle, register) {
    console.log(`Ich rechne: ${cycle.c} * ${register.r}`)
    return cycle.c * register.r;
}

function addx(cycle, register, value) {
    let importantValue = 0;
    for (let i = 0; i < 2; i++) {
        incrementCycle(cycle);
        if (checkCycle(cycle.c)) {
            importantValue = calculateSignalStrength(cycle, register);
        }
        if (i === 1) {
            register.r += value;
        }
    }
    return importantValue;
}

function nopp(cycle, register) {
    incrementCycle(cycle);
    if (checkCycle(cycle.c)) {
        return calculateSignalStrength(cycle, register);
    }
    return 0
}

const fs = require('fs');
try {
    let cycle = {c: 0};
    let register = {r: 1};
    let input = fs.readFileSync('./input.txt', 'utf8').replaceAll("\r", "");
    let line = input.split("\n");
    let signalStrengths = [];
    let erg = 0;
    for (const operation of line) {
        let split = operation.split(" ");
        let iValue = 0;
        if (split[0] === "addx") {
            iValue = addx(cycle, register, parseInt(split[1]));
        } else {
            iValue = nopp(cycle, register);
        }
        if (iValue !== 0) {
            signalStrengths.push(iValue);
        }
    }

    console.log("signal Länge: ", signalStrengths.length);
    for (const strength of signalStrengths) {
        erg += strength;
    }
    console.log("Ergebnis: ", erg);

} catch (err) {
    console.error(err);
}