<!DOCTYPE html>
    <html lang="en">
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard</title>

        <style>
            :root{
                --primary:#2563eb;--secondary:#7c3aed;--success:#16a34a;
                --danger:#dc2626;--warning:#f59e0b;--dark:#0f172a;
            }

            *{
                margin:0;padding:0;box-sizing:border-box;font-family:Segoe UI,sans-serif
            }

            body{
                background: radial-gradient(circle at top left,#dbeafe 0%,transparent 35%), radial-gradient(circle at top right,#ddd6fe 0%,transparent 35%), #eef2ff;
                min-height:100vh;
            }

            .sidebar{
                position:fixed;left:0;top:0;width:260px;height:100vh;
                background:linear-gradient(180deg,#0f172a,#1e293b);
                padding:25px;color:#fff;overflow:auto;
            }

            .logo{
                font-size:26px;font-weight:700;text-align:center;margin-bottom:20px

            }

            .home-btn,.nav a{
                display:block;
                text-decoration:none;
                color:#fff;
                padding:12px 15px;
                border-radius:12px;margin-bottom:8px;background:rgba(255,255,255,.06)
            }

            .home-btn{
                background:var(--primary)
            }

            .nav a:hover{
                background:rgba(255,255,255,.12)
            }

            .main{
                margin-left:260px;padding:25px
            }

            .topbar{
                display:flex;justify-content:space-between;gap:20px;flex-wrap:wrap;margin-bottom:20px
            }

            .glass{
                background:rgba(255,255,255,.7);
                backdrop-filter:blur(16px);
                border:1px solid rgba(255,255,255,.4);
                box-shadow:0 8px 30px rgba(0,0,0,.08);
                border-radius:20px;
            }

            .profile,.notify{
                padding:15px 20px

            }

            .kpis{
                display:grid;
                grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
                gap:18px;
                margin-bottom:20px
            }

            .card{
                padding:20px

            }

            .card h4{
                color:#64748b
            }

            .card h2{
                margin:8px 0
            }

            .badge{
                display:inline-block;
                padding:5px 10px;border-radius:30px;
                font-size:12px;
                background:#dcfce7;
                color:#15803d
            }

            .grid{
                display:grid;grid-template-columns:2fr 1fr;gap:20px;
            }

            .graph{
                padding:20px
            }

            .graph svg{
                width:100%;height:350px

            }

            .right{
                display:flex;flex-direction:column;gap:20px
            }

            .pie{
                width:180px;
                height:180px;
                border-radius:50%;margin:20px auto;
                background:conic-gradient(#2563eb 0 45%,#16a34a 45% 70%,#f59e0b 70% 85%,#dc2626 85% 100%);
            }
            .bars{
                display:flex;
                align-items:flex-end;
                gap:8px;height:180px;
                padding-top:20px
            }

            .bar{
                flex:1;border-radius:8px 8px 0 0;
                background:linear-gradient(to top,#2563eb,#60a5fa)
            }

            .todo-wrap{
                display:grid;grid-template-columns:1fr 1fr;gap:10px
            }

            .note{
                padding:15px;
                border-radius:10px;
                min-height:90px;font-weight:600
            }
            
            .yellow{
                background:#fef08a;
                transform:rotate(-2deg)
            }

            .green{
                background:#bbf7d0;
                transform:rotate(2deg)
            }
            
            .pink{
                background:#fbcfe8;
                transform:rotate(-1deg)
            }

            .blue{
                background:#bfdbfe;
                transform:rotate(1deg)
            }

            .orders,.bottom-grid{
                margin-top:20px
            }

            table{
                width:100%;border-collapse:collapse
            }

            th,td{
                padding:12px;border-bottom:1px solid #ddd;
                text-align:left
            }

            th{
                background:#0f172a;color:#fff
            }

            .status{
                padding:4px 10px;
                border-radius:30px;
                font-size:12px
            }
            .del{
                background:#dcfce7;color:#166534
            }

            .ship{
                background:#dbeafe;color:#1d4ed8
            }

            .proc{
                background:#fef3c7;color:#92400e
            }

            .bottom-grid{
                display:grid;
                grid-template-columns:1fr 1fr 1fr;gap:20px
            }

            .feed ul,.alerts ul{
                padding-left:20px
            }

            .feed li,.alerts li{
                margin:10px 0
            }

            .progress{
                height:12px;
                background:#e5e7eb;
                border-radius:20px;overflow:hidden;
                margin-top:10px
            }

            .progress span{
                display:block;
                height:100%;
                background:linear-gradient(90deg,#2563eb,#7c3aed);
                width:82%
            }

            .calendar-grid{
                display:grid;
                grid-template-columns:repeat(7,1fr);
                gap:5px;
                margin-top:10px
            }

            .calendar-grid div{
                text-align:center;
                padding:8px;
                border-radius:8px;
                background:#f1f5f9
            }

            .today{
                background:#2563eb !important;
                color:#fff
            }

            @media(max-width:1000px){
                .grid,.bottom-grid{grid-template-columns:1fr}
            }

            @media(max-width:768px){
                .sidebar{position:relative;width:100%;height:auto}
                .main{margin-left:0}
            }

            .graph svg{
                width:100%;
                height:450px;
            }

            .grid-line{
                stroke:#dbe4f0;
                stroke-width:1;
            }

            .graph-point{
                fill:white;
                stroke:#2563eb;
                stroke-width:4;
            }

            .graph text{
                fill:#64748b;
                font-size:13px;
                font-weight:600;
            }
        </style>
    </head>
    <body>

    @if (session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif
    
        <div class="sidebar">
        <div class="logo">Admin Panel</div>
        <a href="/" class="home-btn">← Back to Homepage</a>
        <div class="nav">
        <a href="#">Dashboard</a>
        <a href="#">Products</a>
        <a href="#">Orders</a>
        <a href="#">Customers</a>
        <a href="#">Analytics</a>
        <a href="#">Inventory</a>
        <a href="#">Coupons</a>
        <a href="#">Settings</a>
        </div>
        </div>

        <div class="main">
        <div class="topbar">
        <div class="glass profile"><strong>Welcome Admin 👋</strong><br>Last Login: Today 09:15 AM</div>
        <div class="glass notify">🔔 12 Notifications &nbsp; 🛒 7 Orders &nbsp; ✉️ 4 Messages</div>
        </div>

        <div class="kpis">
        <div class="glass card"><h4>Today's Revenue</h4><h2>$12,890</h2><span class="badge">▲ 12.5%</span></div>
        <div class="glass card"><h4>Orders Today</h4><h2>248</h2><span class="badge">▲ 8.2%</span></div>
        <div class="glass card"><h4>Visitors</h4><h2>8,430</h2><span class="badge">▲ 15.1%</span></div>
        <div class="glass card"><h4>Conversion Rate</h4><h2>6.4%</h2><span class="badge">▲ 2.4%</span></div>
        </div>

        <div class="grid">
        <div class="glass graph">

        <h2>Business Growth Analytics</h2>

        <svg viewBox="0 0 1000 450">

            <!-- Horizontal Grid -->

            <line x1="50" y1="50" x2="950" y2="50" class="grid-line"/>
            <line x1="50" y1="120" x2="950" y2="120" class="grid-line"/>
            <line x1="50" y1="190" x2="950" y2="190" class="grid-line"/>
            <line x1="50" y1="260" x2="950" y2="260" class="grid-line"/>
            <line x1="50" y1="330" x2="950" y2="330" class="grid-line"/>
            <line x1="50" y1="400" x2="950" y2="400" class="grid-line"/>

            <!-- Vertical Grid -->

            <line x1="100" y1="50" x2="100" y2="400" class="grid-line"/>
            <line x1="180" y1="50" x2="180" y2="400" class="grid-line"/>
            <line x1="260" y1="50" x2="260" y2="400" class="grid-line"/>
            <line x1="340" y1="50" x2="340" y2="400" class="grid-line"/>
            <line x1="420" y1="50" x2="420" y2="400" class="grid-line"/>
            <line x1="500" y1="50" x2="500" y2="400" class="grid-line"/>
            <line x1="580" y1="50" x2="580" y2="400" class="grid-line"/>
            <line x1="660" y1="50" x2="660" y2="400" class="grid-line"/>
            <line x1="740" y1="50" x2="740" y2="400" class="grid-line"/>
            <line x1="820" y1="50" x2="820" y2="400" class="grid-line"/>
            <line x1="900" y1="50" x2="900" y2="400" class="grid-line"/>

            <defs>

                <linearGradient id="g" x1="0" y1="0" x2="0" y2="1">

                    <stop offset="0%" stop-color="#60a5fa" stop-opacity=".6"/>

                    <stop offset="100%" stop-color="#60a5fa" stop-opacity=".03"/>

                </linearGradient>

            </defs>

            <!-- Area Fill -->

            <path
            d="
            M100 350
            C180 330,220 280,260 270
            C320 250,370 230,420 220
            C500 200,560 180,580 170
            C650 140,720 120,740 110
            C800 90,860 70,900 60
            L900 400
            L100 400
            Z"
            fill="url(#g)"
            />

            <!-- Main Line -->

            <path
            d="
            M100 350
            C180 330,220 280,260 270
            C320 250,370 230,420 220
            C500 200,560 180,580 170
            C650 140,720 120,740 110
            C800 90,860 70,900 60"
            fill="none"
            stroke="#2563eb"
            stroke-width="6"
            stroke-linecap="round"
            />

            <!-- Data Points -->

            <circle cx="100" cy="350" r="8" class="graph-point"/>
            <circle cx="260" cy="270" r="8" class="graph-point"/>
            <circle cx="420" cy="220" r="8" class="graph-point"/>
            <circle cx="580" cy="170" r="8" class="graph-point"/>
            <circle cx="740" cy="110" r="8" class="graph-point"/>
            <circle cx="900" cy="60" r="8" class="graph-point"/>

            <!-- Revenue Scale -->

            <text x="10" y="400">$0</text>
            <text x="10" y="330">$20k</text>
            <text x="10" y="260">$40k</text>
            <text x="10" y="190">$60k</text>
            <text x="10" y="120">$80k</text>
            <text x="10" y="50">$100k</text>

            <!-- Month Labels -->

            <text x="90" y="430">Jan</text>
            <text x="170" y="430">Feb</text>
            <text x="250" y="430">Mar</text>
            <text x="330" y="430">Apr</text>
            <text x="410" y="430">May</text>
            <text x="490" y="430">Jun</text>
            <text x="570" y="430">Jul</text>
            <text x="650" y="430">Aug</text>
            <text x="730" y="430">Sep</text>
            <text x="810" y="430">Oct</text>
            <text x="890" y="430">Nov</text>

        </svg>

        </div>

        <div class="right">
        <div class="glass card">
        <h3>Sales Distribution</h3>
        <div class="pie"></div>
        </div>

        <div class="glass card">
        <h3>Monthly Growth</h3>
        <div class="bars">
        <div class="bar" style="height:50%"></div>
        <div class="bar" style="height:70%"></div>
        <div class="bar" style="height:40%"></div>
        <div class="bar" style="height:85%"></div>
        <div class="bar" style="height:60%"></div>
        <div class="bar" style="height:90%"></div>
        <div class="bar" style="height:75%"></div>
        </div>
        </div>
        </div>
        </div>

        <div class="orders glass card">
        <h2>Recent Orders</h2>
        <table>
        <tr><th>ID</th><th>Customer</th><th>Product</th><th>Amount</th><th>Status</th></tr>
        <tr><td>#1001</td><td>John Smith</td><td>Headphones</td><td>$120</td><td><span class="status del">Delivered</span></td></tr>
        <tr><td>#1002</td><td>Emma Watson</td><td>Mouse</td><td>$60</td><td><span class="status proc">Processing</span></td></tr>
        <tr><td>#1003</td><td>Michael Lee</td><td>Watch</td><td>$210</td><td><span class="status ship">Shipped</span></td></tr>
        </table>
        </div>

        <div class="bottom-grid">
        <div class="glass card feed">
        <h3>Live Activity Feed</h3>
        <ul>
        <li>09:31 AM - New order placed</li>
        <li>09:28 AM - User registered</li>
        <li>09:22 AM - Product added to cart</li>
        <li>09:12 AM - Coupon redeemed</li>
        </ul>
        </div>

        <div class="glass card alerts">
        <h3>⚠ Low Stock Alerts</h3>
        <ul>
        <li>Wireless Mouse - 3 left</li>
        <li>Gaming Keyboard - 5 left</li>
        <li>SSD 1TB - 2 left</li>
        </ul>
        <h3 style="margin-top:20px">Store Goal</h3>
        <div class="progress"><span></span></div>
        <p style="margin-top:8px">82% Completed</p>
        </div>

        <div class="glass card">
        <h3>Sticky Notes</h3>
        <div class="todo-wrap">
        <div class="note yellow">Approve Products</div>
        <div class="note green">Check Orders</div>
        <div class="note pink">Inventory Audit</div>
        <div class="note blue">Summer Campaign</div>
        </div>
        <h3 style="margin-top:20px">Calendar</h3>
        <div class="calendar-grid">
        <div>Su</div><div>Mo</div><div>Tu</div><div>We</div><div>Th</div><div>Fr</div><div>Sa</div>
        <div></div><div></div><div>1</div><div>2</div><div>3</div><div>4</div><div>5</div>
        <div>6</div><div class="today">7</div><div>8</div><div>9</div><div>10</div><div>11</div><div>12</div>
        </div>
        </div>
        </div>
        </div>

      {{-- Footer --}}
      <footer class="text-center bg-blue-700 text-white py-6 mt-0">
        <p class="text-sm">&copy; 2025  eComm Solutions | Developed by <a href="https://github.com/souparnadey" target="_blank" class="hover:underline">Souparna Dey</a> | All Rights Reserved.</p>
      </footer>

    </body>
    
</html>
    