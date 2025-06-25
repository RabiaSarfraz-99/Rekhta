 @extends('backend.admin')
 @section('title', 'rekhta')

 @section('content')

 <main class="main-content">
     <div class="content-header">
         <h1>Dashboard Overview</h1>
         <p>Welcome back, John! Here's what's happening with your business today.</p>
     </div>

     <!-- Stats Cards -->
     <div class="stats-grid">
         <div class="stat-card">
             <div class="stat-icon revenue">💰</div>
             <div class="stat-content">
                 <h3>$45,231</h3>
                 <p>Total Revenue</p>
                 <span class="stat-change positive">+12.5%</span>
             </div>
         </div>
         <div class="stat-card">
             <div class="stat-icon users">👥</div>
             <div class="stat-content">
                 <h3>2,543</h3>
                 <p>Active Users</p>
                 <span class="stat-change positive">+8.2%</span>
             </div>
         </div>
         <div class="stat-card">
             <div class="stat-icon orders">📦</div>
             <div class="stat-content">
                 <h3>1,423</h3>
                 <p>Orders</p>
                 <span class="stat-change negative">-3.1%</span>
             </div>
         </div>
         <div class="stat-card">
             <div class="stat-icon conversion">📈</div>
             <div class="stat-content">
                 <h3>3.24%</h3>
                 <p>Conversion Rate</p>
                 <span class="stat-change positive">+0.5%</span>
             </div>
         </div>
     </div>

     <!-- Charts and Tables Section -->
     <div class="dashboard-grid">
         <!-- Chart Card -->
         <div class="dashboard-card chart-card">
             <div class="card-header">
                 <h3>Revenue Overview</h3>
                 <select class="time-filter">
                     <option>Last 7 days</option>
                     <option>Last 30 days</option>
                     <option>Last 3 months</option>
                 </select>
             </div>
             <div class="chart-container">
                 <div class="chart">
                     <div class="chart-bars">
                         <div class="bar" style="height: 60%"></div>
                         <div class="bar" style="height: 80%"></div>
                         <div class="bar" style="height: 45%"></div>
                         <div class="bar" style="height: 90%"></div>
                         <div class="bar" style="height: 70%"></div>
                         <div class="bar" style="height: 85%"></div>
                         <div class="bar" style="height: 95%"></div>
                     </div>
                     <div class="chart-labels">
                         <span>Mon</span>
                         <span>Tue</span>
                         <span>Wed</span>
                         <span>Thu</span>
                         <span>Fri</span>
                         <span>Sat</span>
                         <span>Sun</span>
                     </div>
                 </div>
             </div>
         </div>

         <!-- Recent Orders Table -->
         <div class="dashboard-card table-card">
             <div class="card-header">
                 <h3>Recent Orders</h3>
                 <a href="#" class="view-all">View All</a>
             </div>
             <div class="table-container">
                 <table class="data-table">
                     <thead>
                         <tr>
                             <th>Order ID</th>
                             <th>Customer</th>
                             <th>Amount</th>
                             <th>Status</th>
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td>#12345</td>
                             <td>Alice Johnson</td>
                             <td>$299.00</td>
                             <td><span class="status completed">Completed</span></td>
                         </tr>
                         <tr>
                             <td>#12346</td>
                             <td>Bob Smith</td>
                             <td>$156.50</td>
                             <td><span class="status pending">Pending</span></td>
                         </tr>
                         <tr>
                             <td>#12347</td>
                             <td>Carol Davis</td>
                             <td>$89.99</td>
                             <td><span class="status shipped">Shipped</span></td>
                         </tr>
                         <tr>
                             <td>#12348</td>
                             <td>David Wilson</td>
                             <td>$445.00</td>
                             <td><span class="status completed">Completed</span></td>
                         </tr>
                     </tbody>
                 </table>
             </div>
         </div>

         <!-- Top Products -->
         <div class="dashboard-card">
             <div class="card-header">
                 <h3>Top Products</h3>
             </div>
             <div class="product-list">
                 <div class="product-item">
                     <img src="/placeholder.svg?height=50&width=50" alt="Product" class="product-img">
                     <div class="product-info">
                         <h4>Wireless Headphones</h4>
                         <p>1,234 sold</p>
                     </div>
                     <div class="product-revenue">$12,340</div>
                 </div>
                 <div class="product-item">
                     <img src="/placeholder.svg?height=50&width=50" alt="Product" class="product-img">
                     <div class="product-info">
                         <h4>Smart Watch</h4>
                         <p>987 sold</p>
                     </div>
                     <div class="product-revenue">$9,870</div>
                 </div>
                 <div class="product-item">
                     <img src="/placeholder.svg?height=50&width=50" alt="Product" class="product-img">
                     <div class="product-info">
                         <h4>Laptop Stand</h4>
                         <p>756 sold</p>
                     </div>
                     <div class="product-revenue">$7,560</div>
                 </div>
             </div>
         </div>

         <!-- Activity Feed -->
         <div class="dashboard-card">
             <div class="card-header">
                 <h3>Recent Activity</h3>
             </div>
             <div class="activity-feed">
                 <div class="activity-item">
                     <div class="activity-icon">👤</div>
                     <div class="activity-content">
                         <p><strong>New user registered</strong></p>
                         <span class="activity-time">2 minutes ago</span>
                     </div>
                 </div>
                 <div class="activity-item">
                     <div class="activity-icon">💰</div>
                     <div class="activity-content">
                         <p><strong>Payment received</strong></p>
                         <span class="activity-time">5 minutes ago</span>
                     </div>
                 </div>
                 <div class="activity-item">
                     <div class="activity-icon">📦</div>
                     <div class="activity-content">
                         <p><strong>Order shipped</strong></p>
                         <span class="activity-time">10 minutes ago</span>
                     </div>
                 </div>
                 <div class="activity-item">
                     <div class="activity-icon">⚠️</div>
                     <div class="activity-content">
                         <p><strong>Low stock alert</strong></p>
                         <span class="activity-time">15 minutes ago</span>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </main>
 @endsection