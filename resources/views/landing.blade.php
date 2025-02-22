<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>موقع غندور</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff6f6;
            color: #333;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        header {
            background-color: #331c41fc;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        header img {
            height: 60px;
        }

        nav a {
            color: #ecf0f1;
            margin: 0 20px;
            font-weight: 500;
            transition: color 0.3s ease;
            font-size: 16px !important;
        }

        nav a:hover {
            color: #d9a9ff !important;
        }

        .login-button {
            background-color: #4e1173;
            color: #fff !important;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 700;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-left: 20px;
        }

        .login-button:hover {
            background-color: #6c00c0;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .login-button:active {
            transform: translateY(0);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .hero {
            background-image: url('{{ asset('images/hero.jpg') }}');
            background-size: cover;
            background-position: center;
            height: 85vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            text-align: center;
            padding: 0 20px;
            position: relative;
            flex-direction: column;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgb(0 0 0 / 49%);
        }

        .hero h1 {
            font-size: 4rem;
            margin: 0;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
            position: relative;
            z-index: 1;
            color: #fff;
        }

        .hero p {
            font-size: 1.8rem;
            margin: 20px 0 0;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.7);
            position: relative;
            z-index: 1;
            color: #fff;
        }

        section {
            padding: 80px 20px;
            text-align: center;
        }

        h2 {
            font-size: 2.8rem;
            color: #2c3e50;
            margin-bottom: 40px;
            position: relative;
        }

        h2::after {
            content: '';
            width: 60px;
            height: 4px;
            background-color: #3498db;
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
        }

        .about p, .guide p {
            font-size: 1.2rem;
            line-height: 1.8;
            max-width: 800px;
            margin: 0 auto;
            color: #555;
        }

        .features {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
        }

        .feature {
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            width: 280px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .feature h3 {
            color: #3498db;
            font-size: 1.6rem;
            margin-bottom: 15px;
        }

        .feature p {
            font-size: 1.1rem;
            color: #666;
        }

        .guide a {
            display: inline-block;
            margin-top: 30px;
            padding: 12px 30px;
            background-color: #4e1173 ;
            color: #fff;
            font-weight: 500;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .guide a:hover {
            background-color: #6c00c0;
        }

        .games-section .game-category {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .game {
            background-color: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            width: 220px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .game:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .game img {
            width: 100%;
            border-radius: 8px;
        }

        .game p {
            font-size: 1.3rem;
            margin-top: 15px;
            color: #2c3e50;
        }

        .team-section .team-members {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .member {
            background-color: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            width: 220px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .member:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .member p {
            font-size: 1.3rem;
            color: #2c3e50;
            margin: 0;
        }

        footer {
            background-color: #331c41fc;
            color: #ecf0f1;
            text-align: center;
            padding: 30px;
        }

        footer a {
            color: #3498db;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #d9a9ff !important;
        }
    </style>
</head>
<body>
<header>
    <img src="{{ asset('images/ghandour.png') }}" alt="Ghandoor Logo"/>
    <nav>
        <a href="#about">عن غندور</a>
        <a href="#features">المميزات</a>
        <a href="#guide">تحميل</a>
        <a href="/dashboard/sign-in" class="login-button">تسجيل الدخول</a>
    </nav>
</header>

<section class="hero" style="background-image: url('{{ asset('images/hero.jpg') }}');">
    <h1>مرحبًا بكم في غندور!</h1>
    <p>تجربة تفاعلية متكاملة وألعاب تعليمية مصممة لدعم تعلم الأطفال ذوي متلازمة داون</p>
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
        <h3>قابلة للتخصيص</h3>
        <p>تكييف مسارات التعلم لتناسب احتياجات كل طفل.</p>
    </div>
    <div class="feature">
        <h3>رؤى للآباء</h3>
        <p>احصل على تقارير مفصلة ورؤى حول تقدم طفلك ونقاط قوته.</p>
    </div>
    <div class="feature">
        <h3>التعلم بالألعاب</h3>
        <p>تجربة تعليمية تفاعلية تعتمد على تكرار المشاهد المدعومة وتعزيز المهارات المكتسبة لضمان تقدم الأطفال في التعلم.</p>
    </div>
</section>

<section id="guide" class="guide">
    <h2>كيفية تثبيت واستخدام غندور</h2>
    <p>
        قم بتنزيل تطبيق غندور من الرابط. اتبع الخطوات
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
            <p>غيث الطباع</p>
        </div>
        <div class="member">
            <p>حازم أبو سعد</p>
        </div>
        <div class="member">
            <p>علي الحلبي</p>
        </div>
        <div class="member">
            <p>وديع عبد الباقي</p>
        </div>
    </div>
</section>

<footer>
    <p>
        غندور &copy; 2025 جميع الحقوق محفوظة |
        <a href="#">سياسة الخصوصية</a>
    </p>
</footer>
</body>
</html>
