    <!-- Navbar -->
    <nav class="navbar bg-dark border-bottom border-bottom-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <div>
        </div>
        <a class="navbar-brand" href="index.php"><b>KUIZER</b></a>
        <div id="sketch-holder">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.6.0/p5.js"></script>
            <script>
            function setup() {
                var canvas = createCanvas(200, 40);
                canvas.parent('sketch-holder');
            }
            function draw() {
                function addZero(i) {
                    if (i < 10) {
                        i = "0" + i
                    }
                    return i;
                }
                const months = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Augustus","September","Oktober","November","Desember"];

                const d = new Date();
                let year = d.getFullYear();
                let month = months[d.getMonth()];
                let date1 = d.getDate();
                let h = addZero(d.getHours());
                let m = addZero(d.getMinutes());
                let s = addZero(d.getSeconds());
                let time = h + " : " + m + " : " + s + " WIB";
                let hari = date1 + " " + month + " " + year;
                background('#212529');
                textSize(15);
                fill(255);
                text("Jam : ", 3, 36);
                text(hari, 65, 18);
                fill(240, 20, 20);
                text(time, 45, 36);
                textStyle(BOLD);
                textFont('Helvetica');
            }
            </script>
        </div>
    </div>
    </nav>