# rese
飲食店予約アプリ
<img width="1440" alt="スクリーンショット 2022-08-13 20 36 36（2）" src="https://user-images.githubusercontent.com/104364543/184491124-9c12d741-f354-4e0c-8a96-e16d1c7507ed.png">

## 作成した目的
アドバンスタームの学習のため作成

## アプリケーションURL
https://rocky-hollows-86306.herokuapp.com  
架空ユーザーが設定してあるのでそれでログインできます。
・ユーザー
name : rese
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
検索機能（エリア、ジャンル、店名）
評価機能
管理者画面で店舗代表者を作成
管理者画面でユーザーにメール送信（現在はサンプル的なコードが書いてあります）
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
![スクリーンショット 2022-08-14 9 14 55](https://user-images.githubusercontent.com/104364543/184517517-4399b014-f4ab-4b91-944f-b951e67ff053.png)
![スクリーンショット 2022-08-14 9 15 32](https://user-images.githubusercontent.com/104364543/184517521-15438276-1084-4296-848e-d8c0dab84742.png)

## ER図
![スクリーンショット 2022-08-07 17 21 11](https://user-images.githubusercontent.com/104364543/184517543-fede9730-11e2-47b4-955e-5dedd38e6219.png)

## その他
・Mailtrapを使用してメールの送信を行なっているので.envから設定をしてください。
・ローカル環境とheroku環境での画像の表示が変わりますので、コメントアウトしてあるところを逆転させてください。
・heroku環境での場合。最初に登録してある20店舗はseederでテストデータを登録していて画像の表示方法が異なりますので、
  店舗代表者画面から最初の20店舗の画像を違うものに変えて更新すると画像が表示されないので、新しい店舗を追加する際は新規登録をしてください。

