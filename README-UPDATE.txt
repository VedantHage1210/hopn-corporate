HOPn update package — how to apply
==================================
1) Backup your project (or commit the current state to git).
2) Copy everything in this folder over your project root (same folder structure; files overwrite/add).
3) Delete these 4 junk files from the project root (if present):
      [
      true])
      getPathInfo())
      writeToFile(public_path('sitemap.xml'))
4) Run:
      php artisan migrate --force        # 1 migration (adds columns to job_applications for the Send Your CV form)
      php artisan optimize:clear
5) Only if the Railway site is STAGING (not the live site), add variables:
      STAGING=true
      STAGING_PASSWORD=choose-a-password   (optional; username = STAGING_USER, default "hopn")
   On production leave STAGING unset.
6) Hard-refresh the browser (public/css and public/js changed).

CV downloads: CVs are opened through the admin area (/admin/files/cv), so a missing /storage symlink no longer causes 404.
If CLOUDINARY_API_SECRET is NOT set, CVs are stored on the server's local disk (fine on Hostinger, wiped on Railway redeploys).
