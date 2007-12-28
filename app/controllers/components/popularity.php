class PopularityComponent extends Object
{
    var $controller = true;
 
    function startup(&$controller)
    {
        // This method takes a reference to the controller which is loading it.
        // Perform controller initialization here.
    }
 
    function isPopular()
    {
        $this->someVar = 'foo';
    }
}
