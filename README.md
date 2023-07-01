# 使用php實作api
## 原理
client <-> json <-> server
## 檔案
客戶端 `client.html` \
伺服端 `/api` \
參數 `/api/config.php`
## 使用方式
查看 `data();` \
新增 `add(name,data);` \
刪除 `del(id);` \
更改 `upd(id,name,data);`
## 資料庫
- GET  /api/sql_data 查看資料✅
- POST /api/sql_add 新增資料✅
- POST /api/sql_delete 刪除資料✅
- POST /api/sql_update 修改資料✅
