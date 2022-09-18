# rese
飲食店予約アプリ
<img width="1440" alt="スクリーンショット 2022-08-13 20 36 36（2）" src="https://user-images.githubusercontent.com/104364543/184491124-9c12d741-f354-4e0c-8a96-e16d1c7507ed.png">

## 作成した目的
外部の飲食店予約サービスは手数料を取られるので自社で予約サービスを持ちたい。  

## アプリケーションURL
https://rocky-hollows-86306.herokuapp.com  
架空ユーザーが設定してあるのでそれでログインできます。
・ユーザーname : rese
email : rese@rese.com
password : 12345678

・店舗代表者  
name : 店舗代表者1  
email : test1@example.com  
password : 12345678  

name : 店舗代表者2  
email : test2@example.com  
password : 12345678  

name : 店舗代表者3  
email : test3@example.com  
password : 12345678  

・管理者   
name : test  
email : test@example.com  
password : 12345678  



## 機能一覧
会員登録（LaravelBreeze) 
ログイン（メール認証）
ログアウト  
ユーザー情報取得  
ユーザー飲食店お気に入り一覧取得  
ユーザー飲食店予約情報取得  
飲食店一覧取得  
飲食店詳細取得  
飲食店お気に入り追加、削除
飲食店予約情報追加、削除、変更  
検索機能（エリア、ジャンル、店名)  
評価機能  
管理者画面で店舗代表者を作成  
管理者画面でユーザーにメール送信（現在はサンプル的なコードが書いてあります)  
店舗代表者画面で新規店舗作成、店舗情報の更新、予約確認  
画像をストレージに保存する(local環境)  
リマインダー（予約日の朝7時に予約確認のメールを送る）  
QRコード（予約の情報を確認する）  
決済機能（Stripe）  


## 使用技術
Laravel Framework 8.83.23  
PHP 8.1.6  
Javascript  

## テーブル設計
![スクリーンショット 2022-09-18 23 32 01](https://user-images.githubusercontent.com/104364543/190912397-1855991d-1438-4be6-abae-93273d3557ee.png)  
![スクリーンショット 2022-09-18 23 32 36](https://user-images.githubusercontent.com/104364543/190912449-4035653a-200d-4f9f-8bc5-4911a2bf3bef.png)  
![スクリーンショット 2022-09-18 23 33 11](https://user-images.githubusercontent.com/104364543/190912466-0f8af79b-d44a-4c12-a95d-7b5549e0bbd8.png)  

## ER図
![スクリーンショット 2022-09-18 23 13 29](https://user-images.githubusercontent.com/104364543/190911681-3a8c2f59-7b9a-4359-b87c-f79e9a6c4c79.png)

## その他
・Mailtrapを使用してメールの送信を行なっているので.envから設定をしてください。  
・ローカル環境とheroku環境での画像の表示が変わりますので、コメントアウトしてあるところの確認しをお願いします。 
  (resources/views/detail.blade.php),(resources/views/mypage.blade.php),(resources/views/shop.blade.php)  
  (app/Http/Controller/Representative/RepresentativeController.php)
・heroku環境での場合。最初に登録してある20店舗はseederでテストデータを登録していて画像の表示方法が異なりますので、  
  店舗代表者画面から最初の20店舗の画像を違うものに変えて更新すると画像が表示されないので、新しい店舗を追加する際は新規登録をしてください。  

