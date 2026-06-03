// pages/order_detail/order_detail.js
var app = getApp();
Page({

  /**
   * 页面的初始数据
   */
  data: {
    order_detail:[],
    qrcode: "",
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad(options) {
    var that = this;
    this.setData({
      order_id:options.order_id
     })
    //  获取相关信息
    wx.request({
      url: app.globalData.serverAddress +'function/wx/get_user_orders_detail.php',
      data:{
        token:wx.getStorageSync('token'),
        order_id: that.data.order_id
      },
      success:(res)=>{
        console.log(res.data);
        that.setData({
          order_detail: res.data
        })
      }
    })
    // 获取二维码
    wx.request({
      url: app.globalData.serverAddress +'function/wx/generate_qrcode.php',
      data:{
        token:wx.getStorageSync('token'),
        order_id: that.data.order_id
      },
      success:(res)=>{
        console.log(res.data);
        that.setData({
          qrcode: res.data
        })
      }
    })
  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady() {

  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow() {

  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide() {

  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload() {

  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh() {

  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom() {

  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage() {

  }
})