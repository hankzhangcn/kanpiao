// pages/index/index.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    motto: "在这里\n拥抱所有热情",

    
    indicatorDots: true, //是否显示面板指示点
    autoplay: true, //自动轮播
    interval: 7000, // 自动切换时间间隔
    duration: 1000, // 滑动动画时长
    circular: true, //是否采用衔接滑动 
    banners: [],
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    wx.request({
      url: 'http://localhost:8008/function/banner.php',
      data:{

      },
      success:(res)=>{
        this.setData({
          banners: res.data
        }),
        console.log(res.data)
      }
    })
  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {

  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function () {

  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide: function () {

  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload: function () {

  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh: function () {

  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom: function () {

  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {

  }
})