# Redis untuk Session & Cache — Desain

## Ringkasan

Menerapkan Redis sebagai storage untuk session dan cache pada aplikasi buku_tamu berbasis CodeIgniter 4. Tujuannya:
1. Menghilangkan penumpukan file session di `writable/session/`
2. Mempercepat semua halaman melalui Redis cache

## Pendekatan

**Approach B**: Session + Cache menggunakan `phpredis` (native extension).

- Extension `phpredis` sudah ter-install di server
- CodeIgniter 4 menyediakan `RedisHandler` native (bukan Predis)
- Tidak perlu Composer package tambahan

## Perubahan per File

### 1. `app/Config/Session.php`

Konfigurasi session menggunakan `RedisHandler`:

```php
public string $driver = \CodeIgniter\Session\Handlers\RedisHandler::class;
public string $savePath = 'tcp://127.0.0.1:6379?prefix=ci_session_';
public int $lockRetryInterval = 100_000;
public int $lockMaxRetries = 300;
```

### 2. `app/Config/Cache.php`

Konfigurasi cache menggunakan `redis` handler:

```php
public string $handler = 'redis';
```

Bagian `redis` array sudah ada templatenya (tidak perlu diubah jika nilai default sudah sesuai):
- host: `127.0.0.1`
- port: `6379`
- password: `null`
- database: `0`

### 3. `.env`

Tambahkan konfigurasi:

```env
session.driver = 'CodeIgniter\Session\Handlers\RedisHandler'
session.savePath = 'tcp://127.0.0.1:6379?prefix=ci_session_'

cache.handler = 'redis'
```

## Prasyarat Server

1. Extension `phpredis` ter-install: `php -m | grep redis`
2. Service Redis berjalan: `redis-cli ping` → `PONG`

## Verifikasi

1. Login ke aplikasi → cek `writable/session/` (file session tidak boleh bertambah)
2. `curl -I` dua kali ke halaman → response kedua lebih cepat (cache hit)
3. `redis-cli keys 'ci_session_*'` → melihat key session di Redis
4. `redis-cli keys '*'` → melihat semua key cache

## Urutan Implementasi

1. Update `.env` dengan konfigurasi session & cache
2. Update `app/Config/Session.php`
3. Update `app/Config/Cache.php`
4. Verifikasi

## Estimasi Effort

Sangat kecil — hanya perubahan konfigurasi di 3 file, tidak ada perubahan kode aplikasi.
