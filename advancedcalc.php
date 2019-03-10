<?php
  include 'links.php';
  include 'header.php';
?>

<head>
  <title>Advanced Calculator</title>
  <link rel="stylesheet" href="style/advancedcalc.css">
</head>

<body>
  <div class="main-container">
    <div class="container-fluid roboto">
    
      <h1 class="calc-h1">Advanced Calculator</h1>
      <div class="calc-parent no-select">
        <!-- Calculator main section -->
        <div class="equation-display"></div>
        <div class="calc-row">
          <div class="column" id="calc-display-val">0</div>
        </div>
        <div class="calc-row">
          <div class="calc-btn column" id="calc-clear">AC</div>
          <div class="calc-btn column" id="calc-backspace">&#8676;</div>
          <div class="calc-btn calc-btn-operator column" id="calc-divide">&#247;</div>
        </div>
        <div class="calc-row">
          <div class="calc-btn calc-btn-num column" id="calc-seven">7</div>
          <div class="calc-btn calc-btn-num column" id="calc-eight">8</div>
          <div class="calc-btn calc-btn-num column" id="calc-nine">9</div>
          <div class="calc-btn calc-btn-operator column" id="calc-multiply">x</div>
        </div>
        <div class="calc-row">
          <div class="calc-btn calc-btn-num column" id="calc-four">4</div>
          <div class="calc-btn calc-btn-num column" id="calc-five">5</div>
          <div class="calc-btn calc-btn-num column" id="calc-six">6</div>
          <div class="calc-btn calc-btn-operator column" id="calc-minus">-</div>
        </div>
        <div class="calc-row">
          <div class="calc-btn calc-btn-num column" id="calc-one">1</div>
          <div class="calc-btn calc-btn-num column" id="calc-two">2</div>
          <div class="calc-btn calc-btn-num column" id="calc-three">3</div>
          <div class="calc-btn calc-btn-operator column" id="calc-plus">+</div>
        </div>
        <div class="calc-row">
          <div class="calc-btn calc-btn-num column" id="calc-zero">0</div>
          <div class="calc-btn column" id="calc-decimal">.</div>
          <div class="calc-btn calc-btn-operator column" id="calc-equals">=</div>
        </div>
        <!-- End calculator main section -->

        <!-- Calculator Sidebar -->
        <div class="calc-sidebar">
          <div class="calc-sidebar-row">
            <div class="calc-btn calc-btn-operator column" id="calc-invert" title="Invert number">&plusmn;</div>
            <div class="calc-btn calc-btn-operator column" id="calc-pow" title="To the power of">^</div>
          </div>
          <div class="calc-sidebar-row">
            <div class="calc-btn calc-btn-operator column" id="calc-squareroot" title="Squareroot">&radic;</div>
          </div>
          <div class="calc-sidebar-row">
            <div class="calc-btn calc-btn-operator column" title="Square">#&#178;</div>
          </div>
          <div class="calc-sidebar-row">
            <div class="calc-btn calc-btn-operator column" title="Cube">#&#179;</div>
          </div>
          <div class="calc-sidebar-row">
            <div class="calc-btn calc-btn-operator column" title="Percentage">%</div>
          </div>
          <div class="calc-sidebar-row">
            <div class="calc-btn calc-btn-operator column" id ="calc-pi" title="PI">&pi;</div>
          </div>
        </div> <!-- end calc-sidebar -->

        <!-- Calculator Bottombar -->
        <div class="calc-bottombar">
          <div class="calc-bottombar-row">
            <div class="calc-btn calc-btn-operator column" id="calc-invert" title="Invert number">&plusmn;</div>
            <div class="calc-btn calc-btn-operator column" id="calc-pow" title="To the power of">^</div>
            <div class="calc-btn calc-btn-operator column" id="calc-squareroot" title="Squareroot">&radic;</div>
            <div class="calc-btn calc-btn-operator column" id="calc-square" title="Square">#&#178;</div>
          </div>
          <div class="calc-bottombar-row">
            <div class="calc-btn calc-btn-operator column" id="calc-cube" title="Cube">#&#179;</div>
            <div class="calc-btn calc-btn-operator column" title="Percentage">%</div>
            <div class="calc-btn calc-btn-operator column" id ="calc-pi" title="PI">&pi;</div>
          </div>
        </div>
      </div> <!-- end calc-parent -->
    
    </div> <!-- end container-fluid -->
  </div> <!-- end main-container -->
  
  <script src="js/advancedcalc.js"></script>
</body>