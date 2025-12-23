# On-Device makine öğrenmesi & Google Gemini API Entegrasyonu

Bu proje, mobil yapay zekâ sistemlerinde kullanılan iki temel yaklaşımı
On-Device Makine Öğrenmesi ve Bulut Tabanlı Büyük Dil Modelleri (Google Gemini API)
üzerinden ele alan, hem teorik hem de uygulamalı bir çalışmadır.

Çalışmanın temel amacı; bu teknolojilerin yalnızca kavramsal olarak anlatılması değil,
aynı zamanda çalışan bir web tabanlı demo üzerinden nasıl entegre edildiklerinin
somut biçimde gösterilmesidir.

# Projenin Amacı

Bu proje aşağıdaki sorulara yanıt vermeyi hedefler:

On-Device Machine Learning neden mobil uygulamalarda tercih edilir?

TensorFlow Lite mobil cihazlar için hangi problemleri çözer?

Büyük dil modelleri neden cihaz üzerinde değil bulut ortamında çalıştırılır?

Google Gemini API mobil uygulamalara nasıl entegre edilir?

Flutter ekosisteminde cihaz içi ve bulut tabanlı yapay zekâ yaklaşımları nasıl birlikte kullanılır?

Bu doğrultuda proje, akademik araştırma + çalışan demo yaklaşımıyla tasarlanmıştır.

# Proje Kapsamı

Proje üç ana yapı üzerine kuruludur:

# 1. On-Device Makine Öğrenmesi (TensorFlow Lite – Teorik)

Bu bölümde cihaz içi makine öğrenmesi mimarisi kavramsal olarak ele alınmaktadır:

Verilerin cihaz üzerinde işlenmesi

Gizlilik ve düşük gecikme avantajları

Model optimizasyonu (quantization, pruning)

Mobil donanım kullanımı (CPU / GPU / NNAPI)

Flutter tarafında entegrasyon mantığı

# Bu projede TensorFlow Lite uygulamalı olarak kullanılmamış, mimari ve teorik çerçeve bilgi sayfaları üzerinden açıklanmıştır.

# 2. Google Gemini API (Bulut Tabanlı Yapay Zekâ – Uygulamalı)

Bu bölümde Google Gemini API aktif olarak kullanılmaktadır:

Büyük dil modellerinin temel yapısı

API tabanlı istemci–sunucu mimarisi

Metin üretimi, özetleme ve sohbet botu senaryoları

Gerçek zamanlı API çağrıları

Bu kapsamda kullanıcıların etkileşime girebildiği canlı Gemini chatbot demo’su sunulmaktadır.

# 3. Hibrit Yapay Zekâ Yaklaşımı

Projede vurgulanan temel fikir şudur:

Gerçek zamanlı, gizlilik odaklı görevler → On-Device ML

Metin üretimi ve muhakeme gerektiren görevler → Google Gemini API

Bu hibrit yaklaşım, mobil uygulamaların hem performans hem de
işlevsellik açısından dengeli olmasını sağlar.

# Canlı Gemini Chatbot

Proje içerisinde yer alan chatbot modülü:

Sadece giriş yapan kullanıcılar tarafından kullanılabilir

Kullanıcı mesajları veritabanına kaydedilir

Sorular Gemini API’ye gönderilir

Üretilen yanıtlar anlık olarak kullanıcıya gösterilir

Bu yapı sayesinde:

API entegrasyonu

Veritabanı kullanımı

Kullanıcı–AI etkileşimi

uygulamalı olarak sergilenmektedir.

📁 Proje Dosya Yapısı
/ (root)
│
├── index.php # Ana sayfa (proje tanıtımı)
├── login.php # Kullanıcı giriş sayfası
├── register.php # Kullanıcı kayıt sayfası
├── logout.php # Oturum kapatma
│
├── chat.php # Gemini API ile canlı sohbet ekranı
│
├── ondevice.php # On-Device ML özet sayfası
├── ondevice_detay.php # On-Device ML detaylı anlatım (üyelere özel)
│
├── gemini_info.php # Google Gemini API özet
├── gemini_detay.php # Gemini API detaylı anlatım
│
├── nasil_yapildi.php # Projenin geliştirme süreci
│
├── db.php # Veritabanı bağlantısı (PDO)
├── config.php # API anahtarları ve yapılandırma
├── gemini.php # Gemini API çağrılarını yapan yardımcı fonksiyon
│
├── /partials
│ ├── header.php # Ortak üst yapı (navbar, head)
│ └── footer.php # Ortak alt yapı
│
├── /assets
│ ├── css/
│ └── style.css # Tüm sayfaların ortak stil dosyası
│
│
│
└── README.md # Proje dokümantasyonu

🛠️ Kullanılan Teknolojiler

PHP (PDO) – Sunucu tarafı işlemler

MySQL – Kullanıcı ve mesaj verileri

Google Gemini API – Büyük dil modeli entegrasyonu

Flutter – Mobil mimari bağlam ve entegrasyon yaklaşımı (teorik)

# Genel Mimari

İstemci: Kullanıcı arayüzü

Sunucu: Kimlik doğrulama, veritabanı, API çağrıları

AI Katmanı:

TensorFlow Lite (teorik)

Google Gemini API (uygulamalı)

# Sonuç

Bu proje, mobil yapay zekâ sistemlerinde:

Gizlilik

Performans

Ölçeklenebilirlik

Kullanıcı deneyimi

kriterlerini birlikte ele alan modern bir yaklaşımı temsil etmektedir.

TensorFlow Lite ve Google Gemini API’nin birlikte değerlendirilmesi,
Flutter tabanlı mobil uygulamalar için güçlü, dengeli ve sürdürülebilir
yapay zekâ çözümleri üretilebileceğini göstermektedir.

# not:JavaScript bu projede aktif bir iş mantığı için kullanılmamıştır.Tüm kritik işlemler (kimlik doğrulama, veritabanı işlemleri ve Gemini API çağrıları) sunucu tarafında PHP ile gerçekleştirilmiştir.Bu tercih, API anahtarlarının istemci tarafına sızmasını önlemek ve daha güvenli bir mimari oluşturmak amacıyla yapılmıştır.
