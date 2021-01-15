var i;
var fib = [];
document.write("Fibonancii series:-<br>")
fib[0] = 0;
fib[1] = 1;
for (i = 2; i <= 10; i++) {
    fib[i] = fib[i - 2] + fib[i - 1];
    document.write("<br>" + fib[i]);
}






