# laravel5.3-minimum-tutorial
[ING]Laravel5.3でCRUDアプリケーションを作成する簡易チュートリアル

Laravel5.3で最小限の機能＆MVCパターンで作るアプリケーションを作成することで、ざっくりとLaravel5.3での開発概要を掴んで頂く為のミニマムチュートリアルのサンプルになります。

#### それぞれの画面キャプチャ

__1.一覧画面:__
![一覧画面](https://qiita-image-store.s3.amazonaws.com/0/17400/28527040-cd22-8bfe-8666-c221b83bc2e4.png)

__2.詳細画面:__
![詳細画面](https://qiita-image-store.s3.amazonaws.com/0/17400/42d7853c-243e-a56e-b947-ca7bf36648d6.png)

__3.データ入力画面:__
![データ入力画面](https://qiita-image-store.s3.amazonaws.com/0/17400/a0f5f6e6-6484-b96a-bf33-491637917eef.png)

__4.データ編集画面:__
![データ編集画面](https://qiita-image-store.s3.amazonaws.com/0/17400/9e63c98d-4545-0775-ac43-8ea8ce42d9f2.png)

#### 使用したライブラリについて

こちらのサンプルでは「Laravel5.3にも対応をしている点」や「Basic認証・ファイルアップロード機能」といった自前での実装がなかなか難しい部分に関しては下記のライブラリを使用して実装をしています。

+ [Laravel Collective Forms & HTML](https://laravelcollective.com/docs/5.3/html) → ViewとなるbladeテンプレートのHTMLを扱いやすくする
+ [laravel-stapler](https://github.com/CodeSleeve/laravel-stapler) → ファイルのアップロード機能
+ [l5-very-basic-auth](https://github.com/olssonm/l5-very-basic-auth) → ステートレスなBasic認証

また、ライブラリ導入時のcomposer.jsonの記載は下記のようになります。

```
{
	・・・（省略）・・・
    "require": {
        "php": ">=5.6.4",
        "laravel/framework": "5.3.*",
        "laravelcollective/html": "^5.3.0",
        "codesleeve/laravel-stapler": "1.0.*",
        "aws/aws-sdk-php": "2.4.*",
        "olssonm/l5-very-basic-auth": "2.*"
    },
	・・・（省略）・・・
```

#### 本サンプルについて

こちらのサンプルは以前に作成しました、Laravel5.1での簡易チュートリアルを元にして新たにLaravel5.3にて書き直したものになります。

__Laravelの環境設定＆開発体験自作Laravel5.1ミニマムチュートリアルまとめ:__
(Qiita) http://qiita.com/fumiyasac@github/items/78a335880f7abb1de8bf

本サンプルの具体的な機能やねらいとしては、

+ Laravel5.3でのCRUD処理を作成と理解
+ Formに関するヘルパー機能と画像アップロードに関するライブラリの活用と理解
+ Routing, View, Model, Controllerの基本的な実装体験と概要理解
+ 実際のサンプルを通してのMVCパターンでの開発体験と概要理解
+ Laravelで開発する際に用いるartisanコマンドを用いた開発体験と概要理解
+ Composerを用いたパッケージ管理に関する概要理解
+ ステートレスなBasic認証（追加・変更・削除のアクション）

になります。

#### 実行環境等について

※こちらのサンプルはMAMP(バージョン4.0.6)で動かすことを想定して作られたチュートリアルになります。（2016.12.23時点の最新バージョンになります）

お持ちでない方は下記のリンクよりご自分のMacへインストールして見てください。また、すでにDB内にデータが入った状態を再現したい方はこのリポジトリ内にある `sample_data.sql` を実行してください。

MAMPのダウンロード：
https://www.mamp.info/en/downloads/
