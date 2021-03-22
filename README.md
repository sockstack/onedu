<p align="center"><h1 align="center">onedu</h1></p>

## workflow

```markdown
- master 主分支
- develop 开发分支
- feature 功能分支
- hotfix 紧急修复bug分支
- release 预发布版本分支
```

## 版本合并

```shell
git merge --no-ff
```
## composer

```shell
# 设置阿里云composer源
composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/
```

## 认证
使用laravel框架的自带的认证包
```shell
composer require laravel/sanctum
```
