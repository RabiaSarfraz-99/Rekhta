  <aside class="sidebar">
      <nav class="sidebar-nav">
          <ul>
              <li class="nav-item active">
                  <a href="#" class="nav-link">
                      <span class="nav-icon">📊</span>
                      <span class="nav-text">Dashboard</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="#" class="nav-link">
                      <span class="nav-icon">👥</span>
                      <span class="nav-text">Users</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="#" class="nav-link">
                      <span class="nav-icon">📦</span>
                      <span class="nav-text">Products</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="#" class="nav-link">
                      <span class="nav-icon">💰</span>
                      <span class="nav-text">Sales</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="#" class="nav-link">
                      <span class="nav-icon">📈</span>
                      <span class="nav-text">Analytics</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="#" class="nav-link toggle-dropdown">
                      <span class="nav-icon">📈</span>
                      <span class="nav-text">Change Logo</span>
                      <span class="dropdown-arrow">▼</span>
                  </a>
                  <ul class="submenu">
                      <li><a href="{{ route('addlogo') }}">Add Logo</a></li>
                      <li><a href="{{ route('logolist') }}">View Logo</a></li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a href="#" class="nav-link toggle-dropdown">
                      <span class="nav-icon">📈</span>
                      <span class="nav-text">NavBar</span>
                      <span class="dropdown-arrow">▼</span>
                  </a>
                  <ul class="submenu">
                      <li><a href="{{ route('addnavbar') }}">Add to Navbar</a></li>
                      <li><a href="{{ route('navbarlist') }}">View List</a></li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a href="#" class="nav-link toggle-dropdown">
                      <span class="nav-icon">📈</span>
                      <span class="nav-text">Hero Section</span>
                      <span class="dropdown-arrow">▼</span>
                  </a>
                  <ul class="submenu">
                      <li><a href="{{ route('addheroslide') }}">Add slide</a></li>
                      <li><a href="{{ route('herolisting') }}">View Slides</a></li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a href="#" class="nav-link toggle-dropdown">
                      <span class="nav-icon">📈</span>
                      <span class="nav-text">Today's Top 5 Shayari</span>
                      <span class="dropdown-arrow">▼</span>
                  </a>
                  <ul class="submenu">
                      <li><a href="{{ route('addtopShayari') }}">Add Shayari</a></li>
                      <li><a href="{{ route('topshayarilisting') }}">View Shayari</a></li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a href="#" class="nav-link toggle-dropdown">
                      <span class="nav-icon">📈</span>
                      <span class="nav-text">More from Rekhta</span>
                      <span class="dropdown-arrow">▼</span>
                  </a>
                  <ul class="submenu">
                      <li><a href="{{ route('addtomore') }}">Add Sides</a></li>
                      <li><a href="{{ route('learnmorelisting') }}">View Slides</a></li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a href="#" class="nav-link toggle-dropdown">
                      <span class="nav-icon">📈</span>
                      <span class="nav-text">Library Books Section</span>
                      <span class="dropdown-arrow">▼</span>
                  </a>
                  <ul class="submenu">
                      <li><a href="{{ route('addlibrarybook') }}">Add Books </a></li>
                      <li><a href="{{ route('librarybooklisting') }}">View Books</a></li>
                  </ul>
              </li>

              <li class="nav-item">
                  <a href="#" class="nav-link toggle-dropdown">
                      <span class="nav-icon">📈</span>
                      <span class="nav-text">Poetry Collection</span>
                      <span class="dropdown-arrow">▼</span>
                  </a>
                  <ul class="submenu">
                      <li><a href="{{ route('poetrycollectionlisting') }}">Poetry Collection listing</a></li>
                      <li><a href="{{ route('addpoetrycollection') }}">Add Poetry Collection</a></li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a href="#" class="nav-link toggle-dropdown">
                      <span class="nav-icon">📈</span>
                      <span class="nav-text">Shayari Collection</span>
                      <span class="dropdown-arrow">▼</span>
                  </a>
                  <ul class="submenu">
                      <li><a href="{{ route('shayaricollectionlisting') }}">Shayari Collection listing</a></li>
                      <li><a href="{{ route('addshayaricollection') }}">Add Shayari Collection</a></li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a href="#" class="nav-link toggle-dropdown">
                      <span class="nav-icon">📈</span>
                      <span class="nav-text">Recommended Poets </span>
                      <span class="dropdown-arrow">▼</span>
                  </a>
                  <ul class="submenu">
                      <li><a href="{{ route('recommendedpoetslisting') }}">Recommended Poets listing</a></li>
                      <li><a href="{{ route('addrecommendedpoets') }}">Add Recommended Poets</a></li>
                  </ul>
              </li>
                 <li class="nav-item">
                  <a href="#" class="nav-link toggle-dropdown">
                      <span class="nav-icon">📈</span>
                      <span class="nav-text">FeaturedVideo</span>
                      <span class="dropdown-arrow">▼</span>
                  </a>
                  <ul class="submenu">
                      <li><a href="{{ route('recommendedpoetslisting') }}">FeaturedVideo FeaturedVideo</a></li>
                      <li><a href="{{ route('addrecommendedpoets') }}">Add FeaturedVideo</a></li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a href="#" class="nav-link toggle-dropdown">
                      <span class="nav-icon">📈</span>
                      <span class="nav-text">Books</span>
                      <span class="dropdown-arrow">▼</span>
                  </a>
                  <ul class="submenu">
                      <li><a href="{{ route('bookslisting') }}">Books listing</a></li>
                      <li><a href="{{ route('addbooks') }}">Add Books</a></li>
                  </ul>
              </li>
                <li class="nav-item">
                  <a href="#" class="nav-link toggle-dropdown">
                      <span class="nav-icon">📈</span>
                      <span class="nav-text">Word of the Day</span>
                      <span class="dropdown-arrow">▼</span>
                  </a>
                  <ul class="submenu">
                      <li><a href="{{ route('bookslisting') }}">Words listing</a></li>
                      <li><a href="{{ route('addWord') }}">Add Word</a></li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a href="#" class="nav-link">
                      <span class="nav-icon">⚙️</span>
                      <span class="nav-text">Settings</span>
                  </a>
              </li>
          </ul>
      </nav>
  </aside>
  <script>
      document.addEventListener("DOMContentLoaded", function() {
          const navItems = document.querySelectorAll(".nav-item");

          navItems.forEach(item => {
              const link = item.querySelector(".toggle-dropdown");

              if (link) {
                  link.addEventListener("click", function(e) {
                      e.preventDefault();

                      // Close all others
                      navItems.forEach(i => {
                          if (i !== item) {
                              i.classList.remove("active");
                          }
                      });

                      // Toggle current one
                      item.classList.toggle("active");
                  });
              }
          });
      });
  </script>
