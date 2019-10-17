create procedure  splogin
(@customer_contact_emale AS  NVARCHAR(30),   @customer_password  AS  NVARCHAR(30), @status INT OUT)
AS
Begin
 declare @statuse int
 if EXISTS (select* from Customers 
          where customer_contact_emale = @customer_contact_emale
          and customer_password = @customer_password)
          set @statuse=1;
          else
           set @status=0;
           select @status; 
          end
    
// invoice view

     select Orders.OrdersID , sum(Price *Quantity) as totalPrice ,Customers.CustomersID,CustomersFirstName,CustomersLasttName,Orders.Orders_dateandtime
          ,ProductName,DietType,Price 
          from  Orders ,Order_Detail, Products,Customers
          where Orders.OrdersID=Order_Detail.OrdersID
          Group BY Orders.OrdersID     