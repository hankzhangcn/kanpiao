<h1 align="center">
看票
</h1>
<h3 align="center">一个运行在小程序的票务系统</h3>
<p align="center">
<img src="https://img.shields.io/npm/v/@vant/weapp.svg?style=for-the-badge" alt="npm version" />
</p>


**看票Kanpiao** 是一款微信小程序售票软件，旨在为观众和管理员提供高效、便捷的票务操作体验。本仓库包含微信小程序的代码，实现了在微信生态内完成售票以及二维码核销操作。

## 功能特色

- 微信登录：使用微信账号轻松登录。
- 查看演出：浏览可选演出并选择合适的场次。
- 订购门票：在小程序内便捷购票。
- 客服会话：直接在应用中与客服沟通。
- 订单管理：查看和管理已购门票订单。
- 个人信息管理：更新和管理个人资料。
- 二维码生成：生成二维码门票，方便在现场核销。
- 订单核销：管理员可以通过小程序扫描二维码进行订单核销。
- 分享：与好友分享演出信息和购票体验。

## 管理后台
前台使用微信小程序相关技术栈。

后台使用PHP，MySQL。

管理员功能（如演出管理、订单追踪等），见管理后台仓库：[kanpiao-web](https://github.com/hankzhangcn/kanpiao-web)。

## 快速开始

### 先决

- 一个微信开发者账号，用于设置和部署小程序。
- 微信开发者工具，用于本地运行和测试小程序。

### 安装步骤

1. 克隆此仓库到本地：

   ```bash
   git clone git@github.com:hankzhangcn/kanpiao.git
   ```

1. 打开微信开发者工具并导入该项目。

1. 根据你的环境配置 `app.json` 和 `config.js` 文件中的应用设置。

1. 在微信开发者工具中运行小程序进行测试。

## 用户角色

- **用户**：使用微信登录后，可浏览演出、选择场次并完成购票。门票将生成二维码，凭此二维码可入场。
- **检票员**：通过小程序扫描二维码核销票务订单。

## 截图

| <img src=".\asset\shows.png" alt="shows" style="zoom: 25%;" /> | <img src=".\asset\check.png" alt="check" style="zoom:33%;" /> | <img src=".\asset\my.png" alt="my" style="zoom: 38%;" /> |
| ------------------------------------------------------------ | ------------------------------------------------------------ | -------------------------------------------------------- |

<img src=".\asset\login.png" alt="login" style="zoom:33%;" />





<img src=".\asset\detail.jpg" alt="detail" style="zoom:33%;" />

<img src=".\asset\detail2.png" alt="detail2" style="zoom:33%;" />

<img src=".\asset\choosestate.jpg" alt="choosestate" style="zoom:33%;" />

<img src=".\asset\createorder.jpg" alt="createorder" style="zoom:33%;" />

<img src=".\asset\orderdetail.jpg" alt="orderdetail" style="zoom:33%;" />



## 参与贡献

欢迎贡献代码！请提交Pull Request或提出Issue，帮助我们改进项目。

## 许可证

本项目基于MIT许可证开源。
