// pages/checker_page/checker_page.js

const app = getApp();
var that = this;

Page({
  
  /**
   * 页面的初始数据
   */
  data: {
    is_checker: false,
    scan_result: "",
    order_detail: "",
    order_status: "",
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad(options) {
    
    var that = this;
    wx.getStorage({
      key: 'is_checker',
      success (res){
        that.setData({
          is_checker: res.data
        });
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

  },

  scanCodeEvent(){
    var that = this;
    wx.scanCode({
      onlyFromCamera: true,// 只允许从相机扫码
      success(res){
        // console.log("扫码成功："+JSON.stringify(res))
        // 扫码成功后  在此处理接下来的逻辑
        that.setData({
          scan_result: res.result//扫描得到的结果
        })
        wx.request({
          url:  app.globalData.serverAddress +'function/wx/qrcode_to_order_detail.php',
          method: 'GET',
          data: {
            qrcode: res.result
          },
          header: {
            'Accept': 'application/json'
          },
          success: function (res) {
            // console.log(res.data);
            that.setData({
              order_detail: res.data,
            })
            if(res.data[0].order_status == 0)
              that.setData({
                order_status: "待检票"
              });
            else if(res.data[0].order_status == 1)
              that.setData({
                order_status: "已检票"
              });
            else
              that.setData({
                order_status: "本订单不可入场"
              });
          }
        })
      },
      fail (err) {
        // console.log(err)
        wx.showToast({
          title:'扫描失败',
          icon: 'none',
          duration: 1000
        })
        that.setData({
          scan_result: '',c:0,cc:0,ccc:0,t:0
        })
      }
    })
  },

  // 入场
  check_in(){
    var that = this;

    wx.request({
      url:  app.globalData.serverAddress +'function/wx/check_in.php',
      method: 'GET',
      data: {
        order_id: that.data.order_detail[0].order_id
      },
      header: {
        'Accept': 'application/json'
      },
      success: function (res) {
        wx.showToast({
          title:'入场成功',
          icon: 'none',
          duration: 1000
        })
        wx.request({
          url:  app.globalData.serverAddress +'function/wx/qrcode_to_order_detail.php',
          method: 'GET',
          data: {
            qrcode: that.data.scan_result
          },
          header: {
            'Accept': 'application/json'
          },
          success: function (res) {
            // console.log(res.data);
            that.setData({
              order_detail: res.data,
            })
            if(res.data[0].order_status == 0)
              that.setData({
                order_status: "待检票"
              });
            else if(res.data[0].order_status == 1)
              that.setData({
                order_status: "已检票"
              });
            else
              that.setData({
                order_status: "本订单不可入场"
              });
          }
        })
      }
   })
  },
  check_out(){
    var that = this;

    wx.request({
      url:  app.globalData.serverAddress +'function/wx/check_out.php',
      method: 'GET',
      data: {
        order_id: that.data.order_detail[0].order_id
      },
      header: {
        'Accept': 'application/json'
      },
      success: function (res) {
        console.log(res.data)
        wx.showToast({
          title:'取消成功',
          icon: 'none',
          duration: 1000
        })
        wx.request({
          url:  app.globalData.serverAddress +'function/wx/qrcode_to_order_detail.php',
          method: 'GET',
          data: {
            qrcode: that.data.scan_result
          },
          header: {
            'Accept': 'application/json'
          },
          success: function (res) {
            // console.log(res.data);
            that.setData({
              order_detail: res.data,
            })
            if(res.data[0].order_status == 0)
              that.setData({
                order_status: "待检票"
              });
            else if(res.data[0].order_status == 1)
              that.setData({
                order_status: "已检票"
              });
            else
              that.setData({
                order_status: "本订单不可入场"
              });
          }
        })
      }
   })
  }

})