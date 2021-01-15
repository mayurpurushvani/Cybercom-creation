var rest = [124, 48, 268];
var r1Bill = [];

function calculateTip() {
    for (i = 0; i < 3; i++) {
        if (rest[i] <= 50) {
            r1Bill[i] = (rest[i] * 20) / 100;
        }
        else if (rest[i] >= 50 && rest[i] <= 200) {
            r1Bill[i] = (rest[i] * 15) / 100;
        }
        else {
            r1Bill[i] = (rest[i] * 10) / 100;
        }
    }
    console.log("Total amount of restaurent is :"+rest);
    console.log("<br>Total amount of tip is :"+r1Bill);
 };
calculateTip();