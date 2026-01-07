# Kütüphane Yönetim Sistemi
PHP ve PDO ile geliştirilmiş Kütüphane Yönetim Sistemi (Okul Projesi)

## 🛠 Kurulum ve Giriş Bilgileri

### Kurulum
1. `kutuphane.sql` dosyasını phpMyAdmin (veya kullandığınız veritabanı aracı) üzerinden içe aktarın (Import).
2. `db.php` dosyasını açın ve veritabanı bağlantı ayarlarını kendi sunucunuza göre düzenleyin.

### Giriş Bilgileri
Yönetici paneline erişmek için aşağıdaki bilgileri kullanabilirsiniz:
* **E-posta:** admin@gmail.com
* **Şifre:** 12345678 (Eğer değiştirdiyseniz güncel şifrenizi yazın)

---

## 💡 Teknik Detaylar ve Geliştirme Notları

Bu proje, akademik bir ödev kapsamında belirli kısıtlamalar ve gereksinimler doğrultusunda geliştirilmiştir. Kod incelemesi yapacaklar için aşağıdaki tasarım kararları bilinçli olarak alınmıştır:

### 1. Yetkilendirme Stratejisi (Authorization)
Proje gereksinimi **"Tek Yöneticili (Admin) Panel"** olduğu için, karmaşık bir **Rol Tabanlı Erişim Kontrolü (RBAC)** sistemi yerine, doğrudan kod seviyesinde basit bir yetki kontrolü tercih edilmiştir.
* **Yaklaşım:** Sistem, veritabanındaki kullanıcıları doğrularken sadece `admin` kullanıcı adına izin verir.
* **Neden:** Veritabanında karmaşık rol tabloları oluşturmak, bu projenin kapsamı (YAGNI prensibi) dışında tutulmuştur. Gerçek hayat senaryolarında bu yapı, kullanıcı rolleri tablosu ile dinamik hale getirilebilir.

### 2. Yönlendirme Yapısı (Routing)
Her sayfa için ayrı PHP dosyaları oluşturmak yerine, `index.php` üzerinde merkezi bir yönlendirme yapısı kurulmuştur.
* **Yaklaşım:** `index.php?sayfa=kitaplar` gibi `GET` parametreleri ile içerik dinamik olarak `switch-case` yapısıyla yüklenmektedir.
* **Neden:** Bu yapı, modern "Single Page Application" mantığının temeli olup, kod tekrarını (header/footer include işlemleri) minimuma indirmek ve bakımı kolaylaştırmak için seçilmiştir.

### 3. Güvenlik Önlemleri
Proje bir "Kavram Kanıtı (Proof of Concept)" niteliğinde olduğu için temel güvenlik önlemleri yeterli görülmüştür:
* **SQL Injection:** Tüm veritabanı sorgularında `PDO Prepare/Execute` yapısı kullanılarak tam koruma sağlanmıştır.
* **Parola Güvenliği:** MD5 gibi eski yöntemler yerine PHP standartlarına uygun `password_hash()` ve `password_verify()` fonksiyonları kullanılmıştır.
* **Kapsam:** İleri düzey XSS ve CSRF korumaları, projenin temel CRUD işlemlerine odaklanması amacıyla bu sürümde kapsam dışı bırakılmıştır.
