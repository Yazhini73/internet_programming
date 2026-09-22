<?php
include 'includes/header.php';

$users       = $conn->query("SELECT COUNT(*) AS c FROM users")->fetch_assoc()['c'];
$courseCount = $conn->query("SELECT COUNT(*) AS c FROM courses")->fetch_assoc()['c'];
$enrolled    = $conn->query("SELECT COUNT(*) AS c FROM enrollments")->fetch_assoc()['c'];
$popular     = $conn->query("SELECT * FROM courses LIMIT 3");
?>

<!-- Hero section -->
<section class="hero">
  <h1>Learn Anytime, Anywhere</h1>
  <p>Browse expert-led courses, enroll in one click, and track your progress from your own dashboard.</p>
  <a class="btn btn-light" href="courses.php">Browse Courses</a>
  <?php if (!isset($_SESSION['user_id'])): ?>
    <a class="btn btn-outline" href="register.php">Join Now</a>
  <?php endif; ?>
</section>

<!-- Live statistics from the database -->
<section class="stats">
  <div class="stat"><h3><?= $courseCount ?></h3><p>Courses</p></div>
  <div class="stat"><h3><?= $users ?></h3><p>Learners</p></div>
  <div class="stat"><h3><?= $enrolled ?></h3><p>Enrollments</p></div>
</section>

<!-- Features -->
<h2 class="section-title">Why Choose EduLearn?</h2>
<p class="section-sub">Everything you need to learn at your own pace</p>
<div class="grid">
  <div class="card">
    <div class="icon">👨‍🏫</div>
    <h3>Expert Instructors</h3>
    <p>Learn from experienced teachers.</p>
  </div>
  <div class="card">
    <div class="icon">⏰</div>
    <h3>Flexible Learning</h3>
    <p>Study anytime at your own pace.</p>
  </div>
  <div class="card">
    <div class="icon">📈</div>
    <h3>Track Progress</h3>
    <p>See all your courses on your dashboard.</p>
  </div>
</div>

<!-- Popular courses from the database -->
<h2 class="section-title">Popular Courses</h2>
<p class="section-sub">Start with one of our top picks</p>
<div class="grid">
<?php while ($c = $popular->fetch_assoc()): ?>
  <div class="card">
    <span class="badge"><?= htmlspecialchars($c['duration']) ?></span>
    <h3><?= htmlspecialchars($c['title']) ?></h3>
    <p><?= htmlspecialchars($c['description']) ?></p>
    <p><strong>By <?= htmlspecialchars($c['instructor']) ?></strong></p>
  </div>
<?php endwhile; ?>
</div>

<!-- Call to action -->
<section class="cta">
  <h2>Ready to start learning?</h2>
  <p>Create a free account and enroll in your first course today.</p>
  <a class="btn btn-light" href="<?= isset($_SESSION['user_id']) ? 'courses.php' : 'register.php' ?>">Get Started</a>
</section>

<?php include 'includes/footer.php'; ?>