<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>موقع غندور</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
</head>
<body>
<header>
    <img src="{{ asset('images/logo.png') }}" alt="Ghandoor Logo"/>
    <nav>
        <a href="#about">عن غندور</a>
        <a href="#features">المميزات</a>
        <a href="#guide">تحميل</a>
        <a href="#contact">تواصل معنا</a>
    </nav>
</header>

<section class="hero" style="background-image: url('{{ asset('images/hero.jpg') }}');">
    <!-- <h1>مرحبًا بكم في غندور!</h1>
    <p>
      تمكين الأطفال المصابين بمتلازمة داون من خلال التعلم الممتع والتفاعلي
    </p> -->
</section>

<section id="about" class="about">
    <h2>عن غندور</h2>
    <p>
        غندور هو منصة تعليمية مبتكرة تهدف إلى توفير تجربة تعلم ممتعة ومثرية
        للأطفال المصابين بمتلازمة داون. يتميز بوجود تميمة غندور، التي تعزز
        التطور من خلال صور جذابة وألعاب وأنشطة مصممة لتحسين المهارات الإدراكية
        والحركية. مع التركيز على الشمولية والتخصيص، يتكيف غندور لتلبية احتياجات
        وتيرة التعلم لكل طفل.
    </p>
</section>

<section id="features" class="features">
    <div class="feature">
        <h3>دروس تفاعلية</h3>
        <p>
            إشراك الأطفال من خلال الرسوم المتحركة الممتعة والألعاب المصممة للتعلم
            التفاعلي.
        </p>
    </div>
    <div class="feature">
        <h3>تجربة قابلة للتخصيص</h3>
        <p>تكييف مسارات التعلم لتناسب احتياجات كل طفل.</p>
    </div>
    <div class="feature">
        <h3>رؤى للآباء</h3>
        <p>احصل على تقارير مفصلة ورؤى حول تقدم طفلك ونقاط قوته.</p>
    </div>
    <div class="feature">
        <h3>التعلم بالألعاب</h3>
        <p>تشجيع التعلم من خلال المكافآت والمستويات والشارات.</p>
    </div>
</section>

<section id="guide" class="guide">
    <h2>كيفية تثبيت واستخدام غندور</h2>
    <p>
        قم بتنزيل تطبيق غندور من متجر التطبيقات المفضل لديك. اتبع الخطوات
        البسيطة في التطبيق لإعداد ملف التعريف الخاص بك وابدأ في استكشاف دروسنا
        وأنشطتنا الممتعة.
    </p>
    <a href="https://example.com/download">تحميل غندور</a>
</section>

<section class="games-section">
    <h2>أمثلة عن الألعاب</h2>
    <div class="game-category">
        <div class="game">
            <img src="{{ asset('images/Picture1.gif') }}" alt="لعبة 1"/>
            <p>لعبة التعليم</p>
        </div>
        <div class="game">
            <img src="{{ asset('images/Picture2.gif') }}" alt="لعبة 2"/>
            <p>لعبة الأرقام</p>
        </div>
        <div class="game">
            <img src="{{ asset('images/Picture3.gif') }}" alt="لعبة 3"/>
            <p>لعبة الأشكال</p>
        </div>
    </div>
</section>

<section class="team-section">
    <h2>فريق غندور</h2>
    <div class="team-members">
        <div class="member">
            <!-- <img src="ghaith.jpg" alt="غيث" /> -->
            <p>غيث الطباع</p>
        </div>
        <div class="member">
            <!-- <img src="hazem.jpg" alt="حازم" /> -->
            <p>حازم أبو سعد</p>
        </div>
        <div class="member">
            <!-- <img src="ali.jpg" alt="علي" /> -->
            <p>علي الحلبي</p>
        </div>
        <div class="member">
            <!-- <img src="wadea.jpg" alt="وديع" /> -->
            <p>وديع عبد الباقي</p>
        </div>
    </div>
</section>

<footer>
    <p>
        غندور &copy; 2025 | مصمم لتمكين العقول الشابة |
        <a href="#">سياسة الخصوصية</a>
    </p>
</footer>
</body>
</html>
