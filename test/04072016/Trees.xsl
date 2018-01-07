<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">


<xsl:key name="children" match="Person" use="@ChildOf" />
<xsl:key name="marriage" match="Person" use="@MarriedTo" />

<xsl:template match="/Tree">

    <div id="tree">
	<ul>
        <xsl:apply-templates select="Person[@ChildOf='0']"/>
    </ul>
	</div>
	
</xsl:template>

<xsl:template match="Person">
    <li>
	  <xsl:variable name="marriage" select="key('marriage', @ID)" />
	  
        <a href="#"><xsl:value-of select="@FirstName" />&#160;<xsl:value-of select="@LastName" /><xsl:if test="$marriage"> &#x26AD; <xsl:value-of select="$marriage/@FirstName"/>&#160;<xsl:value-of select="$marriage/@LastName"/></xsl:if></a>

		
    <xsl:variable name="children" select="key('children', @ID)" />
    <xsl:if test="$children">
        <ul>
            <xsl:apply-templates select="$children" />
        </ul>
    </xsl:if>
	
	<!--- Wenn die Person Kind des angeheirateten Partnes ist-->
	<xsl:variable name="children1" select="key('children', $marriage/@ID)" />
	<xsl:if test="$children1">
        <ul>
            <xsl:apply-templates select="$children1" />
        </ul>
    </xsl:if>
	 </li>
</xsl:template>   

</xsl:stylesheet>